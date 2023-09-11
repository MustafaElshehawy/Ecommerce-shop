<nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="card.php"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" class="bi bi-basket2-fill" viewBox="0 0 16 16" >
            <path d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0v-2zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1z"/>
            </svg>عربتي
        </a>
        <form class="d-flex" role="search" action="shop.php">
            <input class="form-control me-2 text-start" type="search" name="keyword" placeholder="أنت بتدور علي أيه" aria-label="Search">
            <input class="btn btn-success " type="submit" name="searchBTN" value="بحث">
        </form>
    </nav>
    <?php
    $categ="SELECT * FROM categories";
    $result=mysqli_query($conn,$categ);
    ?>
    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between">
            <?php 
                
                while($raw=mysqli_fetch_array($result)){
                ?>
                <a class="nav-item nav-link link-body-emphasis link-dark" href="?cid=<?= $raw['id']?>"><?= $raw['name']?></a>
                <?php
                }
            ?>
        </nav>
    </div>      
</nav>