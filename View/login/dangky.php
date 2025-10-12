<div class="dangki">
	<form action="?quanly=taikhoan&action=dangki" method="post" enctype="multipart/form-data" novalidate>
		<style>
		.dangki-card{max-width:680px;margin:18px auto;padding:18px;border:1px solid #ececec;border-radius:12px;background:linear-gradient(180deg,#fff,#fbfbfb);box-shadow:0 6px 18px rgba(0,0,0,0.06);font-family:Arial,Helvetica,sans-serif}
		.dangki-card h2{font-size:20px;margin:0 0 8px;text-align:center;color:#222}
		.grid{display:grid;grid-template-columns:1fr 1fr;gap:12px}
		.field{margin-bottom:8px}
		.field label{display:block;font-size:13px;margin-bottom:6px;color:#444}
		.field input[type="text"],.field input[type="email"],.field input[type="password"]{width:100%;padding:8px 10px;border:1px solid #d6d6d6;border-radius:8px;font-size:14px;outline:none}
		.field input:focus{border-color:#9ec5ff;box-shadow:0 0 0 3px rgba(62,132,255,0.08)}
		.avatar-wrap{display:flex;gap:12px;align-items:center}
		.avatar-preview{width:90px;height:90px;border-radius:10px;object-fit:cover;border:1px solid #e3e3e3;background:#f5f5f5}
		.file-btn{display:inline-flex;align-items:center;gap:8px;padding:7px 10px;background:#fff;border:1px dashed #cfcfcf;border-radius:8px;cursor:pointer}
		.file-name{font-size:13px;color:#666;margin-top:6px}
		#btn-dk{display:inline-block;background:#28a745;color:#fff;border:none;padding:10px 16px;border-radius:10px;font-weight:600;cursor:pointer}
		.note{font-size:12px;color:#666;margin-top:6px}
		.pw-hint{font-size:12px;color:#888;margin-top:4px}
		@media (max-width:720px){.grid{grid-template-columns:1fr}.avatar-preview{width:78px;height:78px}}
		</style>

		<div class="dangki-card">
			<h2>Đăng ký tài khoản</h2>

			<div class="grid">
				<div class="field">
					<label for="ten">Họ &amp; Tên</label>
					<input required type="text" name="ten" id="ten" placeholder="Nguyễn Văn A">
				</div>

				<div class="field">
					<label for="sdt">Số điện thoại</label>
					<input required pattern="[0-9+\- ]{7,15}" type="text" name="sdt" id="sdt" placeholder="0987654321">
				</div>

				<div class="field">
					<label for="email">Email</label>
					<input required type="email" name="email" id="email" placeholder="you@example.com">
				</div>

				<div class="field">
					<label for="matkhau">Mật khẩu</label>
					<input required minlength="6" type="password" name="matkhau" id="matkhau" placeholder="Mật khẩu (tối thiểu 6 ký tự)">
					<div class="pw-hint" id="pwHint">Mật khẩu mạnh: <span id="pwStrength">—</span></div>
				</div>
			</div>

			<div class="field" style="margin-top:8px">
				<label for="diachi">Địa chỉ</label>
				<input type="text" name="diachi" id="diachi" placeholder="Địa chỉ của bạn (tùy chọn)">
			</div>

			<div class="field avatar-wrap">
				<div style="min-width:100px;text-align:center">
					<img id="avatarPreview" class="avatar-preview" src="/Public/img/1703404101_tải xuống.jfif" alt="avatar">
				</div>
				<div style="flex:1">
					<label class="file-btn" for="hinhanh">Chọn ảnh
						<input type="file" name="hinhanh" id="hinhanh" accept="image/*" style="display:none">
					</label>
					<div class="file-name" id="fileName">Chưa chọn file</div>
					<div class="note">Ảnh jpg/png, tối đa 2MB. Nếu không muốn tải ảnh, bỏ trống.</div>
				</div>
			</div>

			<div style="display:flex;justify-content:space-between;align-items:center;margin-top:14px">
				<div style="font-size:13px;color:#666">Đã có tài khoản? <a href="?quanly=taikhoan&action=dangnhap">Đăng nhập</a></div>
				<button type="submit" name="dangki" id="btn-dk">Tạo tài khoản</button>
			</div>
		</div>

		<script>
		(function(){
			const fileInput = document.getElementById('hinhanh');
			const preview = document.getElementById('avatarPreview');
			const fileName = document.getElementById('fileName');
			const pw = document.getElementById('matkhau');
			const pwStrength = document.getElementById('pwStrength');

			function updateStrength(val){
				if(!val) return pwStrength.textContent = '—';
				let score = 0;
				if(val.length >= 8) score++;
				if(/[A-Z]/.test(val)) score++;
				if(/[0-9]/.test(val)) score++;
				if(/[^A-Za-z0-9]/.test(val)) score++;
				const labels = ['Yếu','Trung bình','Tốt','Rất tốt','Xuất sắc'];
				pwStrength.textContent = labels[Math.min(score,4)];
			}

			if(pw){
				pw.addEventListener('input', function(){ updateStrength(this.value) });
			}

			if(fileInput){
				fileInput.addEventListener('change', function(){
					const f = this.files && this.files[0];
					if(!f){ fileName.textContent = 'Chưa chọn file'; preview.src = '/Public/img/1703404101_tải xuống.jfif'; return; }
					fileName.textContent = f.name;
					if(f.size > 2 * 1024 * 1024){ alert('Kích thước ảnh lớn hơn 2MB.'); this.value = ''; fileName.textContent = 'Chưa chọn file'; return; }
					const reader = new FileReader();
					reader.onload = function(e){ preview.src = e.target.result };
					reader.readAsDataURL(f);
				});
				// allow click on custom label to open file dialog
				const btn = document.querySelector('.file-btn');
				if(btn){ btn.addEventListener('click', function(e){
					// clicking the label already toggles file input when input is inside label
				}); }
			}

			// simple form submit check to show friendly messages
			const form = document.currentScript && document.currentScript.ownerDocument ? null : document.querySelector('form');
			if(form){
				form.addEventListener('submit', function(e){
					if(pw && pw.value.length < 6){ e.preventDefault(); alert('Mật khẩu phải có ít nhất 6 ký tự.'); pw.focus(); }
				});
			}
		})();
		</script>
	</form>
</div>