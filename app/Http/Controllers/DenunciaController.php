<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Denuncia;
use Carbon\Carbon;
class DenunciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function registroDenuncia(Request $request){
        if ($request->mensaje != '') {
           // Procesar el mensaje de la denuncia
         $mensajeDenuncia = $this->preprocesarTexto($request->mensaje);
           // Obtener la respuesta de la IA
         $respuestaIA = $this->obtenerRespuestaIA($mensajeDenuncia);
         $denuncia = Denuncia::where('iduser',Auth::guard('user')->user()->id)->get();
                        if( $denuncia != "" ){
                            $denuncia= new Denuncia;
                            $denuncia->idlocalidad=1;
                            $denuncia->idciudad=1;
                            $denuncia->idfirma=1;
                            $denuncia->ubicacion=$request->ubicacion;
                            $denuncia->iduser= Auth::guard('user')->user()->id;
                            $denuncia->mensaje= $request->mensaje;
                            $denuncia->hora= Carbon::now()->format('H:i:s');
                            $denuncia->fecha=  Carbon::now()->toDateString();
                            $denuncia->tipo= $request->tipo;
                            $denuncia->estado=0;
                            $denuncia->save();
                         }
             $denuncia->mensaje = $denuncia->mensaje . "\n" . $request->mensaje;
           return response()->json(['respuesta' => $respuestaIA]);
            }

            return view('usuario.chat');
}
    public function historial($id_usuario){
      $denuncias=  Denuncia::where('iduser',$id_usuario)->get();
      return view('usuario.historial',compact('denuncias'));

    }
    private function askToChatGPT($prompt)
    {
        // $response = Http::withoutVerifying()
        // ->withHeaders([
        //     'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
        //     'Content-Type' => 'application/json',
        // ])->post('https://api.openai.com/v1/engines/text-davinci-003/completions', [
        //     "prompt" => $prompt,
        //     "max_tokens" => 1000,
        //     "temperature" => 0.5
        // ]);
        // $responseText = $response->json()['choices'][0]['text'];
        $classification = $this->clasificarDemanda($prompt);

        return [
            'response' => $responseText,
            'classification' => $classification
        ];
    }
    private function preprocesarTexto($texto)
    {
        // Tokenización
        $tokens = $this->tokenizarTexto($texto);

        // Eliminación de stopwords
        $tokensSinStopwords = $this->eliminarStopwords($tokens);

        // Lematización
        $tokensLematizados = $this->lematizarTokens($tokensSinStopwords);

        // Unir los tokens lematizados en un solo texto
        $textoProcesado = implode(' ', $tokensLematizados);

        return $textoProcesado;
    }

    /**
     * Tokenización del texto
     */
    private function tokenizarTexto($texto)
    {
        $tokenizer = new nltk\punkt\PunktLanguageVars();
        return $tokenizer->word_tokenize($texto);
    }

    /**
     * Eliminación de stopwords
     */
    private function eliminarStopwords($tokens)
    {
        $stopwords = nltk.corpus\stopwords\words('english');
        return array_diff($tokens, $stopwords);
    }

    /**
     * Lematización de tokens
     */
    private function lematizarTokens($tokens)
    {
        $lemmatizer = new WordNetLemmatizer();
        return array_map(function ($token) use ($lemmatizer) {
            return $lemmatizer->lemmatize($token);
        }, $tokens);
    }

    /**
     * Obtener la respuesta de la IA
     */
    private function obtenerRespuestaIA($mensajeDenuncia)
    {
        // Obtenemos las denuncias existentes
        $denunciasExistentes = Denuncia::pluck('mensaje')->toArray();

        // Preprocesamos las denuncias existentes
        $denunciasProcesadas = array_map(function ($denuncia) {
            return $this->preprocesarTexto($denuncia);
        }, $denunciasExistentes);

        // Agregamos el mensaje de la nueva denuncia
        $denunciasProcesadas[] = $mensajeDenuncia;

        // Creamos una matriz TF-IDF
        $vectorizer = new FeatureExtraction\TfidfVectorizer();
        $matrizTfidf = $vectorizer->fit_transform($denunciasProcesadas);

        // Calculamos la similitud de coseno entre el mensaje de la nueva denuncia y las existentes
        $similitudes = new CosineSimilarity();
        $similitudCosena = $similitudes->pairwise_similarity($matrizTfidf);

        // Obtenemos el índice de la denuncia más similar
        $indiceDenunciaSimilar = array_keys($similitudCosena[count($similitudCosena) - 1], max($similitudCosena[count($similitudCosena) - 1]))[0];

        // Obtenemos la respuesta de la IA para la denuncia similar
        $respuestaIA = $denunciasExistentes[$indiceDenunciaSimilar];

        return $respuestaIA;
    }



    public function index()
    {
      return view('usuario.chat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
