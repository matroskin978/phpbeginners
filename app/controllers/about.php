<?php

global $db;
$title = 'My Blog :: About';

$post = '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, repudiandae iusto mollitia, natus repellendus excepturi obcaecati, dicta labore similique minima alias nostrum dolore soluta nam laborum eos inventore eum porro?</p>
<p>Facere ullam aliquam, dolor perferendis corrupti veniam provident eligendi! Id veritatis corrupti sed adipisci consectetur labore debitis officiis, quasi ut obcaecati ea dolorum repudiandae repellendus aut aperiam? Quaerat, molestias eaque?</p>
<p>Maiores exercitationem nostrum aperiam ea optio aspernatur fugiat odit corrupti molestiae nam nisi, pariatur natus iure, temporibus eos consequatur delectus suscipit esse doloremque voluptatem atque? Ipsa velit voluptatum est beatae.</p>';

$recent_posts = $db->query("SELECT * FROM posts ORDER BY id DESC LIMIT 3")->findAll();

require_once VIEWS . '/about.tpl.php';
