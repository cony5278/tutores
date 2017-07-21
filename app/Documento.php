<?php
namespace Tutores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Documento extends Model
{

    protected $table = 'documentos';

    protected $fillable = [
        'id',
        'archivo',
        'tipo_documento',
        'tarea_id',
        'updated_at'
    ];
    
    public function crear(Request $request, $tarea_id, $requesNameFile)
    {
        foreach ($request->file($requesNameFile) as $file) {
            $archivo = new Archivos($file);
            $documento = $this->create([
                'archivo' => $archivo->quitarExtension(),
                'tarea_id' => $tarea_id,
                'tipo_documento' => $archivo->getExtension()
            ]);
            $archivo->guardarArchivo($documento->updated_at);
        }
    }

    public function extension($id)
    {
        $documento = $this->find($id);
        $archivos = new Archivos(null);
        return $archivos->cadenaExtension($documento->archivo, $documento->tipo_documento, $documento->updated_at);
    }

    /**
     * Get the post that owns the comment.
     */
    public function tareas()
    {
        return $this->belongsTo('Tutores\Tarea');
    }
}
