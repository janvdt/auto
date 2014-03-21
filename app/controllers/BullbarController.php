<?php

class BullbarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		

		$brands = simplexml_load_file('http://www.thuletowbars.com/api/getbrands/3935b26d6df746082fe911b3c71e0adb');
    	
		return View::make('bullbar.index')
			->with('brands',$brands);
	}

	public function getModels($id)
	{
		$url = "http://www.thuletowbars.com/api/getmodels/3935b26d6df746082fe911b3c71e0adb";

		$input = $id;
		
		$fields = array(
								'brand' => urlencode($id)
						);
		
		//url-ify the data for the POST
		foreach($fields as $key=>$value) 
		{ 
			($fields_string = $key.'='.$value); 
		}
		
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		
		

		$response = curl_exec($ch);
		

		curl_close($ch);

		$a = json_decode(json_encode((array) simplexml_load_string($response)),1);

	
		return Response::json($a);
	}

	public function getTypes($id)
	{
		$url = "http://www.thuletowbars.com/api/gettypes/3935b26d6df746082fe911b3c71e0adb";
		
		$model = Input::get('model');
		
		$fields = array(
						'brand' => urlencode('AUDI'),
						'model' => urlencode('A4')
						
				);

		
		$fields_string ='brand='.$id.'&model='.$model;


		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result = curl_exec($ch);

		$xmlObject = new SimpleXMLElement($result);

		$types = array();

		foreach ($xmlObject->children() as $node) {
			if($node != NULL)
			{
			$types[] = $node;
			}
		}



		return $types;
	}

	public function getYears($id)
	{
		$url = "http://www.thuletowbars.com/api/getmodels/3935b26d6df746082fe911b3c71e0adb";

		$input = $id;

		$model = Input::get('model');
		
		$fields = array(
								'brand' => urlencode($id)
						);
		
		//url-ify the data for the POST
		foreach($fields as $key=>$value) 
		{ 
			($fields_string = $key.'='.$value); 
		}
		
		
		//open connection
		$ch = curl_init();
		
		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		
		

		$response = curl_exec($ch);
		

		curl_close($ch);

		$xmlObject = new SimpleXMLElement($response);

		$years = array();

		foreach ($xmlObject->children() as $node) {
			if($node == $model)
			{
				$arr = $node->attributes();   // returns an array
    

        		foreach (range($arr["yearfrom"],$arr["yearto"] ) as $number) {
    				$years[] = $number;
				}
			}
		}

		return $years;
		
	}

	public function getArticles()
	{

		$url = "http://www.thuletowbars.com/api/getarticlesfortype/3935b26d6df746082fe911b3c71e0adb";
		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$parts = parse_url($actual_link);
		parse_str($parts['query'], $query);
		$id = $query['brand'];
		parse_str($parts['query'], $query);
		$model = $query['model'];
		
		$fields = array(
						'brand' => urlencode($id),
						'model' => urlencode($model)
						
				);

		
		$fields_string ='brand='.$id.'&model='.$model;


		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result = curl_exec($ch);


		$xmlObject = new SimpleXMLElement($result);


		$articles = array();

		foreach ($xmlObject->children() as $node) {
			
			$articles[] = $node;
				
		}

		$articlesstring = implode(",",$articles);

		$url = "http://www.thuletowbars.com/api/getinformation/3935b26d6df746082fe911b3c71e0adb";

		$fields = array(
						'article' => urlencode($articlesstring)
						
						
				);

		
		$fields_string ='article='.$articlesstring;


		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result2 = curl_exec($ch);

		$xml = new SimpleXMLElement($result2);


		$articlesxml = array();

    foreach ($xml as $element)
    {
        $tag = $element->getName();
        $e = get_object_vars($element);
        if (!empty($e))
        {
            $articles[$tag] = $element instanceof SimpleXMLElement ? $element : $e;
        }
        else
        {
            $articles[$tag] = trim($element);
        }
    }


    

    json_encode($articles);

	return Response::json($articles);

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}