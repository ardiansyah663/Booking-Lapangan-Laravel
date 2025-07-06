<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Models\Booking;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('field_id')
                    ->relationship('field', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->required(),
                Forms\Components\TextInput::make('whatsapp_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('booking_time')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('field.name')
                    ->label('Lapangan')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp_number')
                    ->label('WhatsApp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booking_time')
                    ->label('Waktu Booking')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'confirmed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'cancelled' => 'Cancelled',
                    ])
                    ->label('Status'),
                SelectFilter::make('field_id')
                    ->relationship('field', 'name')
                    ->label('Lapangan'),
                Tables\Filters\Filter::make('booking_time')
                    ->form([
                        Forms\Components\DatePicker::make('from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('booking_time', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('booking_time', '<=', $date),
                            );
                    })
                    ->label('Periode Booking'),
            ])
            ->actions([
                Tables\Actions\Action::make('confirm')
                    ->label('Confirm Booking')
                    ->action(function (Booking $record) {
                        try {
                            $record->update(['status' => 'confirmed']);

                            $whatsappResult = self::sendWhatsAppMessage(
                                $record->whatsapp_number,
                                "Booking Anda untuk {$record->field->name} pada {$record->booking_time} telah dikonfirmasi!"
                            );

                            if ($whatsappResult['success']) {
                                Notification::make()
                                    ->title('Booking dikonfirmasi')
                                    ->body('Pesan WhatsApp berhasil dikirim')
                                    ->success()
                                    ->send();
                            } else {
                                $whatsappUrl = self::generateWhatsAppWebUrl(
                                    $record->whatsapp_number,
                                    "Booking Anda untuk {$record->field->name} pada {$record->booking_time} telah dikonfirmasi!"
                                );

                                Notification::make()
                                    ->title('Booking dikonfirmasi')
                                    ->body('Klik untuk kirim pesan WhatsApp manual')
                                    ->success()
                                    ->actions([
                                        \Filament\Notifications\Actions\Action::make('send_whatsapp')
                                            ->label('Kirim WhatsApp')
                                            ->url($whatsappUrl)
                                            ->openUrlInNewTab()
                                    ])
                                    ->persistent()
                                    ->send();
                            }
                        } catch (\Exception $e) {
                            Log::error('WhatsApp error: ' . $e->getMessage());

                            $whatsappUrl = self::generateWhatsAppWebUrl(
                                $record->whatsapp_number,
                                "Booking Anda untuk {$record->field->name} pada {$record->booking_time} telah dikonfirmasi!"
                            );

                            Notification::make()
                                ->title('Booking dikonfirmasi')
                                ->body('Klik untuk kirim pesan WhatsApp manual')
                                ->warning()
                                ->actions([
                                    \Filament\Notifications\Actions\Action::make('send_whatsapp')
                                        ->label('Kirim WhatsApp')
                                        ->url($whatsappUrl)
                                        ->openUrlInNewTab()
                                ])
                                ->persistent()
                                ->send();
                        }
                    })
                    ->visible(fn (Booking $record) => $record->status === 'pending'),

                Tables\Actions\Action::make('cancel')
                    ->label('Cancel')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation()
                    ->action(function (Booking $record) {
                        $record->update(['status' => 'cancelled']);

                        Notification::make()
                            ->title('Booking dibatalkan')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (Booking $record) => $record->status !== 'cancelled'),

                Tables\Actions\Action::make('send_whatsapp')
                    ->label('Kirim WhatsApp')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('success')
                    ->url(function (Booking $record) {
                        return self::generateWhatsAppWebUrl(
                            $record->whatsapp_number,
                            "Halo {$record->name}, booking Anda untuk {$record->field->name} pada {$record->booking_time} telah dikonfirmasi!"
                        );
                    })
                    ->openUrlInNewTab()
                    ->visible(fn (Booking $record) => $record->status === 'confirmed'),

                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getWidgets(): array
    {
        return [
            BookingResource\Widgets\BookingStatsWidget::class,
        ];
    }

    private static function generateWhatsAppWebUrl(string $phoneNumber, string $message): string
    {
        $phoneNumber = self::formatPhoneNumber($phoneNumber);
        $encodedMessage = urlencode($message);

        return "https://wa.me/{$phoneNumber}?text={$encodedMessage}";
    }

    private static function formatPhoneNumber(string $phoneNumber): string
    {
        $phoneNumber = preg_replace('/\D/', '', $phoneNumber);

        if (substr($phoneNumber, 0, 1) == '0') {
            $phoneNumber = '62' . substr($phoneNumber, 1);
        }

        if (substr($phoneNumber, 0, 2) != '62') {
            $phoneNumber = '62' . $phoneNumber;
        }

        return $phoneNumber;
    }

    /**
     * Simulasi kirim pesan WhatsApp API
     */
    private static function sendWhatsAppMessage(string $phoneNumber, string $message): array
    {
        // Contoh dummy result sukses
        return ['success' => false];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
