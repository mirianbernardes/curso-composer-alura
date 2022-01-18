<?php
namespace Alura\BuscadorDeCursos;

class Buscador{
    private $httpClient;
    
    private $crawler;

    public function __construct($httpClient, $crawler){
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar($url){
        $response = $this->httpClient->request('GET', $url);
        $html =  $response->getBody(); 

        $this->crawler->addHtmlContent($html);

        $elementoCursos = $this->crawler->filter('span.card-curso__nome');
        foreach ($elementoCursos as $value) {
            $curos[] = $value->textContent;
        }
        return $curos;
    }

}