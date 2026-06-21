<h3>Kirim Pesan</h3>
<p>Sampaikan pertanyaan, saran, atau pengaduan Anda kepada kami.</p>

@if (session('success'))
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-error">
        <i class="fas fa-exclamation-circle"></i> Mohon periksa kembali isian formulir Anda.
    </div>
@endif

<form class="contact-form" action="{{ route('kontak.store') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group">
            <label for="contact-name">Nama Lengkap</label>
            <input type="text" id="contact-name" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required />
            @error('nama') <small class="field-error">{{ $message }}</small> @enderror
        </div>
        <div class="form-group">
            <label for="contact-phone">No. Telepon</label>
            <input type="tel" id="contact-phone" name="no_telp" value="{{ old('no_telp') }}" placeholder="Masukkan nomor telepon" />
        </div>
    </div>
    <div class="form-group">
        <label for="contact-email">Email</label>
        <input type="email" id="contact-email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email" required />
        @error('email') <small class="field-error">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="contact-subject">Subjek</label>
        <input type="text" id="contact-subject" name="subjek" value="{{ old('subjek') }}" placeholder="Masukkan subjek pesan" required />
        @error('subjek') <small class="field-error">{{ $message }}</small> @enderror
    </div>
    <div class="form-group">
        <label for="contact-message">Pesan</label>
        <textarea id="contact-message" name="pesan" rows="5" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
        @error('pesan') <small class="field-error">{{ $message }}</small> @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-full">Kirim Pesan</button>
</form>
