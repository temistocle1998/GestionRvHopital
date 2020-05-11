<?php

namespace RvHopital;

use Illuminate\Database\Eloquent\Model;

class Rendezvouss extends Model
{
    protected $fillable = array('medecin_id', 'user_id', 'libelle', 'date');
    public static $rules = array('medecin_id'=>'required|integer',
                                    'user_id'=>'required|bigInteger',
                                    'libelle'=>'required|min:20',
                                    'date'=>'required|min:3',
                                );
    public function medecins()
    {
        return $this->belongsTo('RvHopital\Medecin');
    }
    public function users()
    {
        return $this->belongsTo('RvHopital\User');
    }
}
 