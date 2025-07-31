<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PengajuanTest extends TestCase
{
    use RefreshDatabase;

public function test_form_pengajuan_gagal_jika_nama_kosong()
{
    $response = $this->post('/pengajuan', [
        'nama' => '',
    ]);

    $response->assertSessionHasErrors('nama');
}

}
