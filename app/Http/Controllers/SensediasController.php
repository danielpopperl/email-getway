<?php

namespace App\Http\Controllers;

use App\Http\Requests\SensediaSendRequest;
use App\Models\Sensedia;
use App\Repositories\MktCloudRestApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SensediasController extends Controller
{

    public function send(SensediaSendRequest $request)
    {
        // INSERT into database before validation
        $row = Sensedia::create([
            'id_empresa'        => $request->id_empresa,
            'id_template'       => $request->id_template,
            'id_unidade'        => $request->id_unidade,
            'nome_cliente'      => $request->nome_cliente,
            'cpf_cnpj_campo'    => $request->cpf_cnpj_campo,
            'email'             => $request->email,
            'request_json'      => $request->all(),
            'status'            => '0'
        ]);

        // GET insert ID
        $rowId = $row->id;

        // Retrieve the validated input data
        $request->validated();

        // GET Business ID from Request
        $businessId = $request->id_unidade;

        // CHECK template ID
        $templateId = $request->id_template;

        Log::info(Sensedia::APIEvent($templateId, Sensedia::setBusinessId($businessId)));
        exit();

        try {

            $request = Http::withToken(MktCloudRestApi::RequestApi())
                ->post(config('services.mkt_cloud.link_entry_journey'), [
                    "contactKey" => "expert_sender",
                    "EventDefinitionKey" => '"' . Sensedia::APIEvent($templateId, Sensedia::setBusinessId($businessId)) . '"',
                    "Data" => $request->all()
                ]);

        } catch (\Exception $e) {
            Log::info($e);

            // SAVE status 2 if ERROR
            $record = Sensedia::find($rowId);
            $record->status = '2';
            $record->save();
        }
    }
}
