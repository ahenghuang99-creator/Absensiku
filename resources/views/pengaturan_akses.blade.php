@include('header')
<style>
    .access-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .access-card {
        width: 900px;
        background: #f4f6fb;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .access-header {
        background: #2f4f8f;
        color: white;
        padding: 18px 25px;
        font-size: 20px;
        font-weight: 600;
    }

    .access-body {
        padding: 25px;
    }

    .access-table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .access-table th {
        background: #ffffff;
        color: #2f4f8f;
        padding: 12px;
        text-align: center;
        font-weight: 600;
    }

    .access-table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #eee;
    }

    .access-table td:first-child {
        text-align: left;
        font-weight: 500;
    }

    .access-table tr:hover {
        background: #f2f6ff;
    }

    .checkbox-style {
        transform: scale(1.2);
        cursor: pointer;
    }

    .btn-save {
        margin-top: 20px;
        background: #2f4f8f;
        color: white;
        padding: 8px 22px;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        float: right;
        transition: 0.3s;
    }

    .btn-save:hover {
        background: #223a6b;
    }
</style>

<div class="access-wrapper">
    <div class="access-card">

        <div class="access-header">
            Pengaturan Akses Menu
        </div>

        <div class="access-body">
            <form method="POST" action="/pengaturan_akses/update">
                @csrf

                <table class="access-table">
                    <tr>
                        <th>Menu</th>
                        @foreach($levels as $levelId => $levelName)
                            <th>{{ $levelName }}</th>
                        @endforeach
                    </tr>

                    @foreach($menus as $menu)
                    <tr>
                        <td>{{ ucwords(str_replace('_',' ', $menu)) }}</td>

                        @foreach($levels as $levelId => $levelName)
                        <td>
                            <input type="checkbox"
                                class="checkbox-style"
                                name="permissions[{{ $levelId }}][]"
                                value="{{ $menu }}"
                                {{ $permissions->where('level', $levelId)
                                    ->where('menu_key', $menu)
                                    ->count() ? 'checked' : '' }}>
                        </td>
                        @endforeach

                    </tr>
                    @endforeach
                </table>

                <button type="submit" class="btn-save">
                    Simpan
                </button>

            </form>
        </div>

    </div>
</div>

@include ('footer')