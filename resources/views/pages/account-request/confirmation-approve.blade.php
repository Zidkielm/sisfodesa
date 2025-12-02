<div class="modal fade" id="confirmationApprove-{{ $item->id }}" tabindex="-1"
    aria-labelledby="confirmationApproveLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/account-request/approval/{{ $item->id }}" method="post">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="confirmationApproveLabel">Konfirmasi Menyetujui</h4>
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <input type="hidden" name="for" value="approve">
                    <span>Apakah anda yakin akan menyetujui akun ini?</span>
                    <div class="form-group mt-3">
                        <label for="resident_id">Pilih Penduduk</label>
                        <select name="resident_id" id="resident_id" class="form-control">
                            <option value="">Tidak Ada</option>
                            @foreach ($residents as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Ya, setujui!</button>
                </div>
            </div>
        </form>
    </div>
</div>
