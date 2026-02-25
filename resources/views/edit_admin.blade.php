<style>

.form-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.08);
    max-width: 650px;
    margin: 0 auto 60px auto;
    overflow: hidden;
    width: 100%;
    max-width: 550px;
}

/* WRAPPER CENTER FULL SCREEN */
.center-wrapper {
    min-height: calc(100vh - 120px); 
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}



/* HEADER CARD */
.form-header {
    background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
    color: white;
    padding: 25px 30px;
}

.form-header h2 {
    margin: 0;
    font-size: 22px;
    font-weight: 600;
}

.form-body {
    padding: 35px 30px;
}

.btn-success {
    background: #27ae60;
    color: white;
}

.btn-success:hover {
    background: #1e8449;
    transform: translateY(-2px);
}


/* INPUT STYLE */
.form-group {
    margin-bottom: 22px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #2c3e50;
    font-size: 14px;
}

/* INPUT WRAPPER (ICON INSIDE) */
.input-wrapper {
    position: relative;
}

.input-wrapper i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #2a5298;
    font-size: 14px;
}

.input-wrapper input {
    width: 100%;
    padding: 12px 14px;
    border-radius: 10px;
    border: 1px solid #ddd;
    font-size: 14px;
    transition: all 0.3s ease;
}

.input-wrapper input:focus {
    border-color: #2a5298;
    box-shadow: 0 0 0 3px rgba(42,82,152,0.15);
    outline: none;
}

/* BUTTONS */
.form-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: 0.3s;
    text-decoration: none;
}

.btn-primary {
    background: #2a5298;
    color: white;
}

.btn-primary:hover {
    background: #1e3c72;
    transform: translateY(-2px);
}

.btn-secondary {
    background: #e0e0e0;
    color: #333;
}

.btn-secondary:hover {
    background: #c7c7c7;
}
</style>
<div class="center-wrapper">
<div class="form-card">

    <div class="form-header">
        <h2><i class="fas fa-user-edit"></i> Edit Admin</h2>
    </div>

    <div class="form-body">
            <form action="{{ url('/aksi_eadmin/'.$bebas->id_user) }}" method="POST">
            @csrf

            <input type="hidden" name="id_user" value="{{ $bebas->id_user }}">

            <div class="form-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <input type="text" name="username" 
                           value="{{ $bebas->username }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="text" name="password" 
                            value="{{ $bebas->password }}" required>
                </div>
            </div>

            <div class="form-group">
                <label>Email</label>
                <div class="input-wrapper">
                    <input type="email" name="email" 
                           value="{{ $bebas->email }}" required>
                </div>
            </div>

            <div class="form-actions">
                <a href="/data_karyawan" class="btn btn-success">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>

        </form>
    </div>

</div>
</div>
