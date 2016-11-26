<?php

//
//  Lifx
//
//  Created by Gene Kelly on 11/25/2016.
//  Copyright © 2016 Gene Kelly. All rights reserved.
//


class Lifx {
		
	var $api_auth_token=""; 
	var $api_url="https://api.lifx.com/";
	var $api_version="v1";
	var $data;
	var $endpoint;
	var $headers;
	var $request_type;

	/***********************************************

	constructor
	Take in and set API token.

	************************************************/
	function __construct($token=NULL) {
		if(!empty($token)) {
			$this->api_auth_token=$token;
		}
	}

	/***********************************************

	states
	https://api.developer.lifx.com/docs/set-state
	https://api.developer.lifx.com/docs/set-states

	************************************************/

	public function states($arr) {
		
		//set request type
		$this->request_type="PUT";

		//set endpoint
		if(empty($arr['states'])) {
			$this->endpoint=$this->api_url.$this->api_version."/lights/all/state";
			$this->data=$arr;
		} else {
			$this->endpoint=$this->api_url.$this->api_version."/lights/states";
			$this->data=json_encode($arr);
			$this->headers="json";
		}		

		//run
		return $this->request();
	}


	/***********************************************

	breathe
	https://api.developer.lifx.com/docs/breathe-effect

	************************************************/

	public function breathe($arr) {
		
		//set request type
		$this->request_type="POST";

		//set endpoint
		if($arr['selector']=='all') {
			$this->endpoint=$this->api_url.$this->api_version."/lights/all/effects/breathe";
		} else {
			$this->endpoint=$this->api_url.$this->api_version."/lights/".$arr['selector']."/effects/breathe";
		}

		unset($arr['selector']);
		$this->data=$arr;

		//run
		return $this->request();
	}

	/***********************************************

	pulse
	https://api.developer.lifx.com/docs/pulse-effect

	************************************************/

	public function pulse($arr) {
		
		//set request type
		$this->request_type="POST";

		//set endpoint
		if($arr['selector']=='all') {
			$this->endpoint=$this->api_url.$this->api_version."/lights/all/effects/pulse";
		} else {
			$this->endpoint=$this->api_url.$this->api_version."/lights/".$arr['selector']."/effects/pulse";
		}

		unset($arr['selector']);
		$this->data=$arr;

		//run
		return $this->request();
	}



	/***********************************************

	request
	Process Lifx API request using cURL.

	************************************************/

	private function request() {
		$ch = curl_init($this->endpoint);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		if(empty($this->headers)) {
			$headers = array(
				'Authorization: Bearer ' . $this->api_auth_token
			);
		} else {
			$headers = array(
				'Authorization: Bearer ' . $this->api_auth_token,
				'Content-Type: application/json'
			);
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		if($this->request_type=='PUT') {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		} else {
			curl_setopt($ch, CURLOPT_POST, true);
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
		$response = curl_exec($ch);
		curl_close($ch);
		return $response;
	}
}
?>