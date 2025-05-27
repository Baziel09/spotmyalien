<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Enums\ReportType;

class ReportsRelationManager extends RelationManager
{
    protected static string $relationship = 'reports';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\ImageColumn::make('photo_path')
                    ->label('Foto')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->openUrlInNewTab(),
                    
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
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
