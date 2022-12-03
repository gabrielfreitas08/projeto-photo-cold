<?php

namespace App\Actions\Voyager;

use TCG\Voyager\Actions\AbstractAction;

class AcaoConfirmarPagamento extends AbstractAction
{
    public function getTitle()
    {
        return 'Concluir Pagamento';
    }

    public function getIcon()
    {
        return 'voyager-basket';
    }

    public function getPolicy()
    {
        return 'read';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right mx-2',
        ];
    }

    public function getDefaultRoute()
    {
        return route('pagamento.index', ['id'=>$this->data->id]);
    }

    /**
     * Se Você só quer mostrar sua ação para telas especificas:
     */
    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'pedidos';
    }
    //para ações em massa:
    /*public function massAction($ids, $comingFrom)
    {
        // Do something with the IDs
        //dd($ids);
        return redirect($comingFrom);
    }//*/
}
