<?php  namespace Codeboard\Users\Http\Controllers; 

use Illuminate\Routing\Controller;
use Raymondidema\Commandee\CommandeeTrait;

class RegistrationsController extends Controller {

    use CommandeeTrait;

    public function create()
    {

        return 'hello';

    }

    public function store()
    {

    }

} 