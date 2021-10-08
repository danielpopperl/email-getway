<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensedia extends Model
{
    use HasFactory;

    protected $casts = [
        'request_json' => 'array'
    ];

    protected $fillable = [
        'cpf_cnpj_campo',
        'dtsimulacao',
        'dtvsimulacao',
        'email',
        'final_cartao',
        'firstname',
        'id_documento',
        'id_empresa',
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
        'valorpi',
        'request_json',
        'status'
    ];

    const PROX_INVESTIMENTO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const COMPLETE_CADASTRO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        // Partner own BU
        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const COMPRA_CONCLUIDA = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => 'APIEvent-7172235a-1052-c827-354f-9109470dd7db',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const CONCENTRACAO_COTA = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const CONFIRA_DADOS = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const FORMA_PAGAMENTO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const DOWNLOAD_BOLETO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const FALHA_PAG_CARTAO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const N_PERCA_OPORTUNIDADE = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const PAG_IDENTIFICADO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const PAG_REALIZADO_SUCESSO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const PAG_RECUSADO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const PEDIDO_REALIZADO_SUCESSO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const RECEBEMOS_PAG = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const COMPRA_APROVADA = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const TERMO_ADITAMENTO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'     => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];

    const TERMO_CAD_POSITIVO = [

        // Partner BU Units - see func 'setBusinessId'
        '999'   => '',

        '4'     => '',  // RENAULT
        '5'     => '',  // NISSAN
        '30'    => '',  // STARA
        '32'	=> ''   // CONSORCIO UP
    ];



    public static function APIEvent($templateId, $businessId){

        $tDownloadBoleto = ['1292'];
        if (in_array($templateId, $tDownloadBoleto)) $apiEvent = Sensedia::DOWNLOAD_BOLETO[$businessId];

        $tCompleteCadastro = ['1292'];
        if (in_array($templateId, $tCompleteCadastro)) $apiEvent = Sensedia::COMPLETE_CADASTRO[$businessId];

        $tCompraConcluida = ['1293', '1294', '1295', '1296', '1297', '1298', '1299', '1300'];
        if (in_array($templateId, $tCompraConcluida)) $apiEvent = Sensedia::COMPRA_CONCLUIDA[$businessId];

        $tNPercaOport = ['1301'];
        if (in_array($templateId, $tNPercaOport)) $apiEvent = Sensedia::N_PERCA_OPORTUNIDADE[$businessId];

        $tPagRealizadoSucesso = ['1302'];
        if (in_array($templateId, $tPagRealizadoSucesso)) $apiEvent = Sensedia::PAG_REALIZADO_SUCESSO[$businessId];

        $tTermoAditamento = ['1303'];
        if (in_array($templateId, $tTermoAditamento)) $apiEvent = Sensedia::TERMO_ADITAMENTO[$businessId];

        $tTermoCadPositivo = ['1305'];
        if (in_array($templateId, $tTermoCadPositivo)) $apiEvent = Sensedia::TERMO_CAD_POSITIVO[$businessId];
        
        $tConfiraDados = ['1306', '1307', '1308', '1309', '1310', '1311', '1312', '1313', '1314', '1315', '1316',
            '1317', '1318', '1319', '1320', '1321'];
        if (in_array($templateId, $tConfiraDados)) $apiEvent = Sensedia::CONFIRA_DADOS[$businessId];

        $tPagIdentificado = ['1322'];
        if (in_array($templateId, $tPagIdentificado)) $apiEvent = Sensedia::PAG_IDENTIFICADO[$businessId];
        
        $tConcentCota = ['1323', '1324'];
        if (in_array($templateId, $tConcentCota)) $apiEvent = Sensedia::CONCENTRACAO_COTA[$businessId];
        
        $tFormaPag = ['1325'];
        if (in_array($templateId, $tFormaPag)) $apiEvent = Sensedia::FORMA_PAGAMENTO[$businessId];

        $tPedidoRealizadoSucesso = ['1326', '1337', '1290'];
        if (in_array($templateId, $tPedidoRealizadoSucesso)) $apiEvent = Sensedia::PEDIDO_REALIZADO_SUCESSO[$businessId];

        $tCompraAprovada = ['1327'];
        if (in_array($templateId, $tCompraAprovada)) $apiEvent = Sensedia::COMPRA_APROVADA[$businessId];

        $tPagRecusado = ['1328'];
        if (in_array($templateId, $tPagRecusado)) $apiEvent = Sensedia::PAG_RECUSADO[$businessId];

        $tFalhaPagCartao = ['1334'];
        if (in_array($templateId, $tFalhaPagCartao)) $apiEvent = Sensedia::FALHA_PAG_CARTAO[$businessId];

        $tRecebemosPag = ['1336'];
        if (in_array($templateId, $tRecebemosPag)) $apiEvent = Sensedia::RECEBEMOS_PAG[$businessId];
        
        $tProxInvest = ['1343'];
        if (in_array($templateId, $tProxInvest)) $apiEvent = Sensedia::PROX_INVESTIMENTO[$businessId];

        return $apiEvent;
    }

    public static function setBusinessId($bId){
        $arrayBusinessId = ['4', '5', '30', '32'];

        if (in_array($bId, $arrayBusinessId)) {
            return $bId;
        }
        
        return '999';

        // '4'     => '',  // RENAULT
        // '5'     => '',  // NISSAN
        // '30'    => '',  // STARA
        // '32'	=> ''   // CONSORCIO UP

        // Unidades - BU Parceria
        // '1'  => '', // EMBRACON
        // '6'	=> '', // SICOOB SC
        // '16' => '', // CHERY
        // '31'	=> '', // BANESE
        // '33'	=> '', // BANESTES
        // '36'	=> '', // PRIMACREDI
        // '37'	=> '', // CONSORCIO PAN
        // '40'	=> '', // MULTICREDI
        // '41'	=> '', // EDANBANK
        // '42'	=> '', // CRESOL
        // '43'	=> '', // UNIDAS
        // '44'	=> '', // AGIBANK
        // '45'	=> '', // TESLA
    }
}