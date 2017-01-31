<?php
echo $this->render('../default/index.php',[
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
]);