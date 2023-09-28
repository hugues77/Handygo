<div class="form-search-home">
    <form action="annonces" method="GET">
        <div class="search-bar-home home_bar">
            <div class="depart-input">
                <input type="text" name="depart" placeholder="Ville de Départ" id="v-dep">
                <i class="fas fa-circle-dot trj_d"></i>
            </div>
            <div>
                <input type="text" name="arrivee" placeholder="Ville de  Destination" id="v-arr">
                <i class="fas fa-circle-dot trj_a"></i>
            </div>
            <div>
                <input id="date_search" name="date_dep" class="date-search" type="text" placeholder="Choisir la date">
                <i class="fas fa-calendar-days date_part"></i>
            </div>
        </div>
        <div class="search-bar-right home_bar">
            <input type="submit" name="search" value="Réchercher">
            <i class="fas fa-search"></i>
        </div>
    </form>
</div>

<!-- menu for phone -->
<div class="form-search-phone">
    <div></div>
    <div class="formSearch">
        <form action="annonces" method="GET">
            <div class="search-bar-home-phone">
                <div class="depart-input">
                    <input type="text" name="depart" placeholder="Ville de Départ" id="v-depart">
                    <i class="fas fa-circle-dot trj_d"></i> 
                </div>
                <div>
                    <input type="text" name="arrivee" placeholder="Ville de  Destination" id="v-arrive">
                    <i class="fas fa-circle-dot trj_a"></i>
                </div>
                <div>
                    <input id="date-depart" name="date_dep" class="date-search" type="text" placeholder="Choisir la date">
                    <i class="fas fa-calendar-days date_part"></i>
                </div>
            </div>
            <button class="search-bar-right-phone" type="submit" name="search"><i class="fas fa-search"></i>Réchercher</button>
        </form>
    </div>
    <div></div>
</div>