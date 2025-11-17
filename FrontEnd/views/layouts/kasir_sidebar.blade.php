<aside class="sidebar">
  <div class="profile">
    <div class="avatar"></div>
    <p class="role">Kasir</p>
    <p class="name">{{ Auth::user()->username }}</p>
  </div>
  <nav class="menu-nav">
    <a href="{{ route('orders.index') }}"><i></i> Menu</a>
    <a href="{{ route('orders.riwayat') }}"><i></i> Riwayat</a>
  </nav>
</aside>
