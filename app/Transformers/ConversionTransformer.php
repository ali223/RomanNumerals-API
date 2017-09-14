<?php
namespace App\Transformers;

use App\Conversion;
use League\Fractal\TransformerAbstract;

class ConversionTransformer extends TransformerAbstract
{
	public function transform(Conversion $conversion)
	{
		return [
			'id' => $conversion->id,
			'decimal' => $conversion->decimal,
			'roman' => $conversion->roman,
			'times' => $conversion->times,
			'date' => $conversion->created_at
								->toDateTimeString()
		];

	}
}