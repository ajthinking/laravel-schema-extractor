<?php

namespace LaravelSchemaExtractor;

use Doctrine\DBAL\Types\Type;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use LaravelSchemaExtractor\Types\EnumType;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class LaravelSchema
{
    public function get()
    {
        $models = collect(['App\User']);

        return $models->flatMap(function($model) {
            return [
                'model' => $model,
                'table' => $this->getTable($model),
                'columns' => $this->getColumns($model),
            ];
        });       
    }

    public function getColumns($model)
    {
        $model = app($model);

        $table = $model->getConnection()->getTablePrefix() . $model->getTable();
        $schema = $model->getConnection()->getDoctrineSchemaManager($table);

        $database = null;
        if (strpos($table, '.')) {
            list($database, $table) = explode('.', $table);
        }

        $columns = $schema->listTableColumns($table, $database);

        $columns = collect($columns)->map(function($column) use($model) {
            return $column->toArray();
            return (object) [
                'name' => $column->getName(),
                'type' => $column->getType()->getName()
            ];                
        });

        return $columns->toArray();
    }

    public function getTable($model)
    {
        $model = app($model);
        return $model->getConnection()->getTablePrefix() . $model->getTable();
    }
}
