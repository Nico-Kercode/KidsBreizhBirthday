<?php $title = "Kid's Breizh Birthday"; ?>

<?php ob_start(); ?>

<?php include('view\elements\nav.php');?>


<div class="container-fluid " id="sousmenu">

    <div class="col-lg-10 offset-lg-2" id="sousmenu">
       
    </div>

</div>

<div class="row my-4">
    <div class="container-fluid d-inline-flex ">

        <div class="d-none d-lg-block col-lg-2 sidebar" id="sidebar">

            <ul>
                <li>lien 1 :" Lorem ipsum dolor sit amet" </li>
                <li>lien 2 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 3 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 4 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 5 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 6 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 7 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 8 :" Lorem ipsum dolor sit amet"</li>
                <li>lien 9 :" Lorem ipsum dolor sit amet"</li>

            
            </ul>


        </div>
        <div class="col-sm-12 col-lg-10 main">

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Quisque sapien velit, aliquet eget commodo nec, auctor a sapien.
                Nam eu neque vulputate diam rhoncus faucibus. Curabitur quis varius libero.
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Aliquam placerat sem at mauris suscipit porta. Cras metus velit, elementum sed pellentesque a, pharetra
                eu
                eros.
                Etiam facilisis placerat euismod. Nam faucibus neque arcu, quis accumsan leo tincidunt varius. In vel
                diam
                enim.
                Sed id ultrices ligula. Maecenas at urna arcu. Sed quis nulla sapien.
                Nam felis mauris, tincidunt at convallis id, tempor molestie libero.
                Quisque viverra sollicitudin nisl sit amet hendrerit.
                Etiam sit amet arcu sem. Morbi eu nibh condimentum, interdum est quis, tempor nisi.
                Vivamus convallis erat in pharetra elementum. Phasellus metus neque, commodo vitae venenatis sed,
                pellentesque non purus.
                Pellentesque egestas convallis suscipit.
                Ut luctus, leo quis porta vulputate, purus purus pellentesque ex, id consequat mi nisl quis eros.
                Integer ornare libero quis risus fermentum consequat.
                Mauris pharetra odio sagittis, vulputate magna at, lobortis nulla. Proin efficitur, nisi vel finibus
                elementum, orci sem volutpat eros, eget ultrices velit mi sagittis massa. Vestibulum sagittis
                ullamcorper
                cursus. Ut turpis dolor, tempor ut tellus et, sodales ultricies elit. Ut pharetra tristique est ac
                dictum.
                Integer ac consectetur purus, vehicula efficitur urna.
                Donec ultrices accumsan ipsum vitae faucibus. Quisque malesuada ex nisi, a bibendum erat commodo in.
                Pellentesque suscipit varius gravida.
                Nam scelerisque est sit amet laoreet pharetra. Vivamus quis ligula sed lacus mattis mollis.
                Vivamus facilisis orci rutrum nulla porta dignissim. Fusce fermentum id nibh laoreet volutpat.
                Suspendisse venenatis, risus sed euismod finibus, risus arcu fringilla augue, nec vulputate felis nisl
                et
                enim.
                In ornare, massa a cursus cursus, nisl mi ornare mauris, nec porttitor risus erat ut odio.
                Integer malesuada hendrerit purus ullamcorper molestie. Fusce imperdiet orci vitae purus suscipit
                rutrum..


            </p>

        </div>

    </div>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>