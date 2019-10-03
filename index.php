<?php
    class individuo{
        public $cod_genetico;
    }

    function analise(){

        $quantidade_de_individuos = 1001;
        $criterio_de_selecao = 4;
        $melhor_individuo = '11111111';
        $t = 1;
        $geracoes = 1;

        while ($geracoes != 10) {


            for ($j = 0; $j < $quantidade_de_individuos; $j++) {
                $individuos[$j] = new individuo();
                for ($i = 0; $i < 8; $i++) {
                    $individuos[$j]->cod_genetico .= rand(0, 1);
                }
            }

            for ($i = 0; $i < $quantidade_de_individuos; $i++) {
                echo "INDIVIDUO Nº " . $i . "      CODIGO GENETICO: " . $individuos[$i]->cod_genetico . "\n";
                    if ($individuos[$i]->cod_genetico == $melhor_individuo) {
                        echo "individuo: " . $i . "     Gerção: ". $geracoes ."    Codigo Genetico:" . $individuos[$i]->cod_genetico;
                        return $individuos[$i]->cod_genetico;
                    }
            }

            echo "**************************************************************************************************************************\n";
            for ($i = 0; $i < $quantidade_de_individuos; $i++) {
                if ((substr_count($individuos[$i]->cod_genetico, '1') > $criterio_de_selecao) && (substr_count($individuos[$i + 1]->cod_genetico, '1') > $criterio_de_selecao)) {
                    $nova_geracao[$i] = new individuo();
                    //==========================================================================//
                    $nova_geracao[$i]->cod_genetico = substr($individuos[$i]->cod_genetico, -4);     //        * M U T A Ç Ã O (PAI)
                    $nova_geracao[$i]->cod_genetico .= substr($individuos[$i + 1]->cod_genetico, -4);  //        * M U T A Ç Ã O (MÃE)
                    //==========================================================================//
                     echo "INDIVIDUO MUTADO: ". $t ."       CODIGO GENETICO: " . $nova_geracao[$i]->cod_genetico . "\n";

                    if ($nova_geracao[$i]->cod_genetico == $melhor_individuo) {
                        echo "individuo Novo: " . $t . "     Gerção: ". $geracoes ."    Codigo Genetico:" . $nova_geracao[$i]->cod_genetico;
                        return $nova_geracao[$i]->cod_genetico;
                    }

                    $t++;

                } else {
                    //echo "INDIVIDUO MUTADO: " . $i . "      CODIGO GENETICO: " . $individuos[$i]->cod_genetico . "     ESTADO: INAPTO \n";
                }
            }
            echo "================================  NOVA GERÇÃO   ================================\n";
            $geracoes++;
        }
    }


    analise();
