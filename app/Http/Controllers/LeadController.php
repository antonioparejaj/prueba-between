<?php
// app/Http/Controllers/LeadController.php
namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Client;
use App\Services\LeadScoringService;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    private $leadScoringService;

    public function __construct(LeadScoringService $leadScoringService)
    {
        //Inyeccion de dependencias: LeadScoringService ahora se pasa a través del constructor usando la inyección de dependencias, eliminando la creación de instancias en el controlador.
        $this->leadScoringService = $leadScoringService;
    }

    public function create()
    {
        return view('leads.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'phone' => 'nullable|string|max:20',
        ]);

        // Utilizo el método create de Eloquent para crear un nuevo Lead a partir de los datos validados.
        $lead = Lead::create($data);

        // Crear un nuevo Cliente asociado a este Lead
        $client = new Client();
        $client->lead_id = $lead->id;
        $client->save();

        // Interact with external lead scoring system
        $this->leadScoringService->scoreLead($lead);

        return 'Lead created successfully';
    }

    /*
     En los métodos show, edit, update, y destroy, se utiliza la característica de Laravel
     llamada "Route Model Binding" para inyectar el modelo Lead en lugar de buscar manualmente por id.

     Se han eliminado las comprobaciones repetitivas para verificar si el Lead existe; en su lugar,
      se utiliza "Route Model Binding". Esto hace el código más claro y fácil de entender.
    */
    public function show(Lead $lead)
    {
        // Utilizo la función compact para pasar datos a las vistas, lo cual es una forma más concisa y legible.
        return view('leads.show', compact('lead'));
    }

    public function edit(Lead $lead)
    {
        return view('leads.edit', compact('lead'));
    }

    public function update(Request $request, Lead $lead)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $lead->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $lead->update($data);
        $this->leadScoringService->scoreLead($lead);

        return 'Lead updated successfully';
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return 'Lead deleted successfully';
    }
}
