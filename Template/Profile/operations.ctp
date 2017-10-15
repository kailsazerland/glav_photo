    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Операции со счетом</h2>
                <hr class="star-primary">
            </div>
        </div>
       	<table class="table">
       		<thead>
       			<th width="5">ID</th>
       			<th>Время операции</th>
       			<th>Кол-во ставок</th>
       			<th width="70%">Описание</th>
       		</thead>
       		<tbody>
       			<?foreach ($payments as $payment):?>
       				<tr class="<?if ($payment->bonuses > 0):?>success<?else:?>danger<?endif;?>">
       					<td><?=$payment->id?></td>
       					<td><?=$payment->created->i18nFormat('HH:mm:ss dd.MM.YYYY')?></td>
       					<td align="center"><?=$payment->bonuses?></td>
       					<td><?=$payment->description?></td>
       				</tr>
       			<?endforeach;?>
       		</tbody>
       	</table>
    </div>
	<div class="pagination"><?=$this->Paginator->numbers();?></div>