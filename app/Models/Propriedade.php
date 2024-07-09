<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriedade extends Model
{
    use HasFactory;

    // Define o nome da tabela no banco de dados associada a este modelo
    protected $table = 'propriedades';

    // Define o nome da chave primária da tabela
    protected $primaryKey = 'idPropriedade';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'idProdutor',
        'nomePropriedade',
        'numeroCar',
        'uf',
        'municipio',
        'pais',
        'status',
        'liberado',
    ];

    // Relacionamento de pertencimento (belongs to) com a model Produtor
    public function produtor()
    {
        // Retorna o relacionamento de pertencimento com a model Produtor
        // 'idProdutor' é o nome da chave estrangeira nesta tabela que referencia a chave primária na tabela 'produtores'
        return $this->belongsTo(Produtor::class, 'idProdutor');
    }

    // Relacionamento personalizado para vinculos
    public function vinculos()
    {
        // Retorna o relacionamento de pertencimento com a model Produtor (usado incorretamente)
        // 'idProdutor' é o nome da chave estrangeira nesta tabela que referencia a chave primária na tabela 'produtores'
        return $this->belongsTo(Produtor::class, 'idProdutor', 'idProdutor');
    }

    // Relacionamento de um para um (has one) com a model Vinculo
    public function vinculo()
    {
        // Retorna o relacionamento de um para um com a model Vinculo
        // 'idPropriedade' é o nome da chave estrangeira na tabela 'vinculos' que referencia a chave primária nesta tabela
        return $this->hasOne(Vinculo::class, 'idPropriedade');
    }
}
