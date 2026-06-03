<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .card { border: none; border-radius: 12px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
        .card-header { border-radius: 12px 12px 0 0 !important; background: linear-gradient(135deg, #667eea, #764ba2); }
        .table thead th { background: #f8f9fa; font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: .5px; color: #6c757d; border-bottom: 2px solid #e9ecef; }
        .table tbody tr:hover { background: #f8f9ff; }
        .badge-laki { background: #dbeafe; color: #1d4ed8; }
        .badge-perempuan { background: #fce7f3; color: #be185d; }
        .btn-action { padding: 4px 10px; font-size: 12px; border-radius: 6px; }
        .pagination .page-link { border-radius: 8px !important; margin: 0 2px; border: none; color: #667eea; }
        .pagination .page-item.active .page-link { background: #667eea; }
        .stats-card { border-radius: 10px; padding: 16px 20px; color: white; }
    </style>
</head>
<body>
<div class="container py-4">

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stats-card" style="background: linear-gradient(135deg,#667eea,#764ba2)">
                <div style="font-size:13px;opacity:.85">Total Masyarakat</div>
                <div style="font-size:28px;font-weight:700">{{ $masyarakat->total() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card" style="background: linear-gradient(135deg,#3b82f6,#1d4ed8)">
                <div style="font-size:13px;opacity:.85">Laki-laki</div>
                <div style="font-size:28px;font-weight:700">{{ \App\Models\Masyarakat::where('jenis_kelamin','Laki-laki')->count() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card" style="background: linear-gradient(135deg,#ec4899,#be185d)">
                <div style="font-size:13px;opacity:.85">Perempuan</div>
                <div style="font-size:28px;font-weight:700">{{ \App\Models\Masyarakat::where('jenis_kelamin','Perempuan')->count() }}</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <h5 class="text-white mb-0"><i class="bi bi-people-fill me-2"></i>Data Masyarakat</h5>
            <a href="{{ route('masyarakat.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-lg me-1"></i>Tambah Data
            </a>
        </div>
        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible m-3 mb-0" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nomor KK</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($masyarakat as $i => $m)
                        <tr>
                            <td class="ps-4 text-muted">{{ $masyarakat->firstItem() + $i }}</td>
                            <td><strong>{{ $m->nama }}</strong></td>
                            <td><code>{{ $m->nik }}</code></td>
                            <td><code>{{ $m->nomor_kk }}</code></td>
                            <td style="max-width:200px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">{{ $m->alamat }}</td>
                            <td>
                                @if($m->jenis_kelamin == 'Laki-laki')
                                    <span class="badge badge-laki px-2 py-1"><i class="bi bi-gender-male me-1"></i>Laki-laki</span>
                                @else
                                    <span class="badge badge-perempuan px-2 py-1"><i class="bi bi-gender-female me-1"></i>Perempuan</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('masyarakat.edit', $m->id) }}" class="btn btn-warning btn-action me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('masyarakat.destroy', $m->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data {{ $m->nama }}?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-action"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center py-3">
                {{ $masyarakat->links() }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>