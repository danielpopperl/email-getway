<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf_cnpj_campo',
        'dtsimulacao',
        'dtvsimulacao',
        'email',
        'final_cartao',
        'firstname',

        'id_documento',
        'id_empresa',
        'id_empresa',
        'id_template',
        'id_template',
        'id_tipo_documento',
        'id_unidade',

        'lkconsultor',
        'lkorcamento',

        'nome_cliente',
        'nome_titular_cartao',

        'numeroproposta',
        'qtde_parcelas_cartao',
        'qtdetotalparcelas',
        'senha',
        'tipodobem',

        'urladitamento',
        'urlapoliceseguro',
        'urlcadastropositivo',
        'urlpagamento',
        'urlpi',
        'urlproposta',

        'valor_cartao',
        'valor_parcela',
        'valorcartaodecredito',
        'valorpi'
    ];

    const UNIDADE_NEGOCIO = [

        //Unidades BU Parceria
        '1'     => 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // EMBRACON
        '6'	    => 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // SICOOB SC
        '16'    => 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // CHERY
        '37'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // CONSORCIO PAN
        '31'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // BANESE
        '33'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // BANESTES
        '36'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // PRIMACREDI
        '40'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // MULTICREDI
        '41'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // EDANBANK
        '42'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // CRESOL
        '43'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // UNIDAS
        '44'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // AGIBANK
        '45'	=> 'APIEvent-7172235a-1052-c827-354f-9109470dd7db', // TESLA

        //Unidadas com BU própria
        '4'     => '', // RENAULT
        '5'     => '', // NISSAN
        '30'    => '', // STARA
        '32'	=> '' // CONSORCIO UP
    ];
}
