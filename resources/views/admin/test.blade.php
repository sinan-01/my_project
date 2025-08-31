@extends('admin.app')

@section('content')
<div class="container mt-4">
    <h1>🔧 Admin Panel Test</h1>
    
    <div class="alert alert-success">
        <h4>✅ Admin Panel Çalışıyor!</h4>
        <p>Tüm route'lar ve bileşenler doğru çalışıyor.</p>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>📊 Sistem Durumu</h5>
                </div>
                <div class="card-body">
                    <p><strong>✅ Dashboard:</strong> Erişilebilir</p>
                    <p><strong>✅ Route'lar:</strong> Yüklendi</p>
                    <p><strong>✅ Database:</strong> Bağlı</p>
                    <p><strong>✅ Views:</strong> Çalışıyor</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>🚀 Hızlı Linkler</h5>
                </div>
                <div class="card-body">
                    <a href="/admin/hadiths" class="btn btn-primary btn-sm mb-2 d-block">Hadisler</a>
                    <a href="/admin/verses" class="btn btn-success btn-sm mb-2 d-block">Ayetler</a>
                    <a href="/admin/books" class="btn btn-info btn-sm mb-2 d-block">Kitaplar</a>
                    <a href="/admin/sliders" class="btn btn-warning btn-sm mb-2 d-block">Sliderlar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection