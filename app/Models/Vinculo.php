<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vinculo extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados associada a este modelo
    protected $table = 'vinculos';

    // Define o nome da chave primária da tabela
    protected $primaryKey = 'idVinculo';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'idPropriedade',
        'idProdutor',
    ];

    // Relacionamento de pertencimento (belongs to) com a model Propriedade
    public function propriedade()
    {
        // Retorna o relacionamento de pertencimento com a model Propriedade
        // 'idPropriedade' é o nome da chave estrangeira nesta tabela que referencia a chave primária na tabela 'propriedades'
        return $this->belongsTo(Propriedade::class, 'idPropriedade');
    }

    // Relacionamento de pertencimento (belongs to) com a model Produtor
    public function produtor()
    {
        // Retorna o relacionamento de pertencimento com a model Produtor
        // 'idProdutor' é o nome da chave estrangeira nesta tabela que referencia a chave primária na tabela 'produtores'
        return $this->belongsTo(Produtor::class, 'idProdutor');
    }
}
