    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Партнерская программа</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="alert alert-info">
        	Ваша партнерская ссылка: <b>http://<?=$_SERVER['HTTP_HOST']?>/?r=<?=$auth['id']?></b>
        </div>
       	<table class="table table-striped">
       		<thead>
       			<th width="5">ID</th>
       			<th>Имя</th>
       			<th>Принес бонусов</th>
       			<th>Создан</th>
       		</thead>
       		<tbody>
       			<?foreach ($referals as $referal):?>
       				<tr class="">
       					<td><?=$referal->id?></td>
       					<td><?=$referal->name?></td>
       					<td><?=$referal->bonuses_referal?></td>
       					<td><?=$referal->created->i18nFormat('HH:mm:ss dd.MM.YYYY')?></td>
       				</tr>
       			<?endforeach;?>
       		</tbody>
       	</table>
    </div>
