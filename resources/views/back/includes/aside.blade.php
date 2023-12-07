<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="pt-5 pb-4" style="text-align: center!important">
          <a href="/" style="text-align: center!important"><img style="width:40%" src="{{asset('assets/images/Fiesta.png')}}" alt=""></a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 mt-1">
      <!-- Users -->
      <li class="menu-item users active">
        <a href="{{route('list.admin.users')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user-circle"></i>
          <div data-i18n="Analytics">Utilisateurs</div>
        </a>
      </li>

      <!-- services -->
      <li class="menu-item services">
        <a href="{{route('list.admin.services')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-cube-alt"></i>
          <div data-i18n="Layouts">Services</div>
        </a>
      </li>

      <!-- categorie -->
      <li class="menu-item categorie">
        <a href="{{route('list.admin.categories')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-user"></i>
          <div data-i18n="Layouts">Catégories des services</div>
        </a>
      </li>

      <!-- packs -->
      <li class="menu-item packs">
        <a href="{{route('list.admin.packs')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-category"></i>
          <div data-i18n="Layouts">Packs</div>
        </a>
      </li>

      <!-- temoignage -->
      <li class="menu-item temoignage">
        <a href="{{route('list.admin.temoignages')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Témoignages</div>
        </a>
      </li>

      <!-- reservation -->
      <li class="menu-item reservation">
        <a href="{{route('list.admin.reservation')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-list-check"></i>
          <div data-i18n="Layouts">Réservations</div>
        </a>
      </li>

    </ul>
  </aside>