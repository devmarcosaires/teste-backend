<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtor extends Model
{
    // Define o nome da tabela no banco de dados associada a este modelo
    protected $table = 'produtores';

    // Define o nome da chave primária da tabela
    protected $primaryKey = 'idProdutor';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = ['registroIndividual', 'nomeProdutor', 'status'];

    // Relacionamento muitos-para-muitos com a model Propriedade
    public function propriedades()
    {
        // Retorna o relacionamento muitos-para-muitos com a model Propriedade
        // 'vinculos' é o nome da tabela pivô
        // 'idProdutor' é o nome da chave estrangeira na tabela 'vinculos' que referencia 'idProdutor' nesta tabela
        // 'idPropriedade' é o nome da chave estrangeira na tabela 'vinculos' que referencia 'idPropriedade' na tabela 'propriedades'
        return $this->belongsToMany(Propriedade::class, 'vinculos', 'idProdutor', 'idPropriedade');
    }
  
}
