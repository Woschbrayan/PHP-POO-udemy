<?php
/**
 * Um algoritimo que lista números sortidos em ordem númerica crescente.
 *
 * @param array $lista Deve ser enviado um array de números.
 * @return array $listaOrdenada conteúdo da lista original em ordenação.
 */
$time_start = microtime(true);
usleep(100);
function listaOrdenada($lista): array
{
	# Verifica o comprimento da lista para executar a função
	if (count($lista) > 1) {
		# Define o primeiro pivô da lista.
		$pivo = array_shift($lista);
		# Cria dois arrays que matém o final inicial da lista original e o final da lista original
		$inicio = array();
		$fim  = array();

		#Percorre cada elemento do array.
		foreach ($lista as $valor) {
			# Compara se o elemento é menor ou igual ao pivô
			if($valor <= $pivo){
				# Adiciona o elemento para o Array $inicio
				$inicio[] = $valor;
			} elseif($valor > $pivo) { /** Se não o elemente é maior que o valor do pivô. */
				# Adiciona o elemento para o Array $fim.
				$fim[] = $valor;
			} 		
		}
		# Repete a função até que a lista original tenha sido completamente ordenada.
		return array_merge(listaOrdenada($inicio), array(key($lista)=>$pivo),listaOrdenada($fim));
	}
	{
		# Retorna a lista original.
		return ($lista);
	}
}
$lista = array(3, 5, 6, -5, -1, 4 ,1, 8, 6, 10, 12, 5);

$time_end = microtime(true);
$time = $time_end - $time_start;


//print_r($lista);
echo "Lista: ".implode(',', $lista).PHP_EOL;
//print_r(listaOrdenada($lista));
echo "Lista ordenada: ".implode(',',listaOrdenada($lista)).PHP_EOL;

echo "Tempo de execução: " . $time ." microsegundos";