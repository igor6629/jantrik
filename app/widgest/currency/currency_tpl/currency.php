<li><a href="#" class="curr">Валюта:  <?=$this->currency['code']?> <i class="fa fa-angle-down"></i></a>
    <ul class="ht-dropdown">
        <?php foreach ($this->currencies as $k => $v):?>
            <?php if ($k != $this->currency['code']): ?>
                <li ><a href="currency/change?curr=<?=$k?>"><?=$k?></a></li>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</li>
