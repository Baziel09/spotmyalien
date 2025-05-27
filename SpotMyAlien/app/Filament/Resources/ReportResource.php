<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportResource\Pages;
use App\Filament\Resources\ReportResource\RelationManagers;
use App\Models\Report;
use App\Enums\ReportType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportResource extends Resource
{
    protected static ?string $model = Report::class;

    protected static ?string $navigationLabel = 'Meldingen';

    protected static ?string $pluralLabel = 'Meldingen';

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('country')->required(),
            Forms\Components\TextInput::make('city')->required(),
            Forms\Components\TextInput::make('street')->required(),

            Forms\Components\Select::make('type')
                ->required()
                ->options(ReportType::options())
                ->label('Type UAP'),

            Forms\Components\Select::make('user_id')
                ->relationship('user', 'name')
                ->searchable()
                ->label('Gemeld Door'),

            Forms\components\DateTimePicker::make('date')->required(),

            Forms\Components\Textarea::make('description')
                ->required()
                ->label('Beschrijving'),

            Forms\Components\Toggle::make('validated')
                ->label('Geverifieerd'),
            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country')
                    ->label('Land')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->label('Stad')
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('street')
                //  ->sortable()
                //  ->searchable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Gemeld Door')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Datum')
                    ->dateTime()
                    ->sortable(),                
                Tables\Columns\CheckboxColumn::make('validated')
                    ->label('Geverifieerd')
            ])
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->paginated([10, 25, 50, 100, 'all'])
            ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReports::route('/'),
            'create' => Pages\CreateReport::route('/create'),
            'edit' => Pages\EditReport::route('/{record}/edit'),
        ];
    }
}
