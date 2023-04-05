<?php

$title = 'My Blog :: About';

$post = '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam, repudiandae iusto mollitia, natus repellendus excepturi obcaecati, dicta labore similique minima alias nostrum dolore soluta nam laborum eos inventore eum porro?</p>
<p>Facere ullam aliquam, dolor perferendis corrupti veniam provident eligendi! Id veritatis corrupti sed adipisci consectetur labore debitis officiis, quasi ut obcaecati ea dolorum repudiandae repellendus aut aperiam? Quaerat, molestias eaque?</p>
<p>Maiores exercitationem nostrum aperiam ea optio aspernatur fugiat odit corrupti molestiae nam nisi, pariatur natus iure, temporibus eos consequatur delectus suscipit esse doloremque voluptatem atque? Ipsa velit voluptatum est beatae.</p>';

$recent_posts = [
    1 => [
        'title' => 'An item',
        'slug' => lcfirst(str_replace(' ', '-', 'An item')),
    ],
    2 => [
        'title' => 'A second item',
        'slug' => lcfirst(str_replace(' ', '-', 'A second item')),
    ],
    3 => [
        'title' => 'A third item',
        'slug' => lcfirst(str_replace(' ', '-', 'A third item')),
    ],
    4 => [
        'title' => 'A fourth item',
        'slug' => lcfirst(str_replace(' ', '-', 'A fourth item')),
    ],
    5 => [
        'title' => 'And a fifth one',
        'slug' => lcfirst(str_replace(' ', '-', 'And a fifth one')),
    ],
];

require_once VIEWS . '/about.tpl.php';
