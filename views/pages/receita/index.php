<?php
$receitaController = new ReceitaController();
$todasReceitas = $receitaController->getTodasReceitas();
$receitaLiquida = $receitaController->getReceitaLiquida();
$valorTotal = null;

if($receitaLiquida < 0){
 $botao = 'btn-danger';
}else{
 $botao = 'panel-primary';
}

?>
<div class="row">
    <div class="col-lg-12">
		<h1 class="page-header">Receitas</h1>
    </div>
<!-- /.col-lg-12 -->                
</div>      
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Receitas Cadastradas
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                
                  <?php if( $todasReceitas ){ ?>
                  
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Valor R$</th>
                                    <th>Data de recebimento</th>
                                    <th>Data de cadastro</th>
                                    <th>Observações</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($todasReceitas as $receita){ 
                            	$valorTotal += $receita->valor;
                            	?>                                                                  
                                <tr>
                                    <td class="gradeA"><?= $receita->id ?></td>
                                    <td class="gradeA"><?= $receita->descricao ?></td>
                                    <td class="gradeA">R$ <?= $receita->valor ?></td>                                        
                                    <td class="gradeA"><?= AppUtil::showHora($receita->data) ?></td>
                                    <td class="gradeA"><?= AppUtil::showHora($receita->data) ?></td>
                                    <td class="gradeA"><?= $receita->observacao ?></td>                                        
                                    <td class="gradeA">
                                        <button 
                                            class="btn btn-default fa fa-pencil-square-o editar"
                                            data-toggle= "tooltip" 
                                            data-placement= "top"  
                                            title="Editar">
                                        </button>
                                        <button 
                                            class="btn btn-default fa fa-times remover"
                                            data-toggle= "tooltip" 
                                            data-placement= "top"  
                                            title="Remover">
                                        </button>
                                    </td>                                        
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                           <?php }else{
                    				echo "Não há registros";
                    			 } ?>  
                    </div>                 
                </div> 
                 <div class="h3 col-lg-4">
                    <button class="btn btn-lg btn-primary" disabled="disabled"><?= "Total: R$ " . $valorTotal ?></button>
	               	<button class="btn btn-lg  <?= $botao ?>" disabled="disabled"><?= "Líquida: R$ " . $receitaLiquida ?></button>
                 </div>    
                   
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <script
        src="<?=BASE_URL;?>/views/js/mensagens-confirmacao/confirmacao.js">
    </script>