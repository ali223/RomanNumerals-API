<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use League\Fractal\Serializer\Serializer;


use App\Conversion;
use App\IntegerConversionInterface;
use App\Transformers\ConversionTransformer;



class ConversionsController extends Controller
{
    protected $manager;
    protected $serializer;
    protected $transformer;

    public function __construct(Manager $manager, Serializer $serializer, TransformerAbstract $transformer)
    {
        $this->manager = $manager;
        $this->serializer = $serializer;
        $this->transformer = $transformer;

        $this->manager->setSerializer($this->serializer);
    }

    public function index()
    {        
        $conversions = Conversion::latest()->get();

        $resource = new Collection($conversions, 
                        $this->transformer, 
                        'conversion');

        return $this->manager
                ->createData($resource)
                ->toArray();
                
    }


    public function popular()
    {
    	
    }

    public function store(Request $request, IntegerConversionInterface $integerConversion)
    {
        
    	$this->validate($request, [
    		'decimal' => 'required|numeric|min:1|max:3999'
    	]);

    	$romanNumeral = $integerConversion
    				->toRomanNumerals($request->decimal);

    	$conversion = Conversion::create([
    		'decimal' => $request->decimal,
    		'roman' => $romanNumeral
    	]);

        $resource = new Item($conversion, 
                        $this->transformer, 
                        'conversion');

        return $this->manager
                ->createData($resource)
                ->toArray();

    }


}
