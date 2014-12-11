<?php
class Presenter extends Controller {
    public function afterroute() {
        echo Template::instance()->render('base.html');
    }

    public function display() {
        $url = $this->framework->get('PARAMS.0');
        $this->framework->set('content', 'form.html');
    }

    public function generate() {
        $nama = $this->framework->get('POST.produk_nama');
        $kategori = $this->framework->get('POST.produk_kategori');
        $deskripsi = $this->framework->get('POST.produk_deskripsi');
        $fitur = $this->framework->get('POST.produk_fitur');
        $spesifikasi = $this->framework->get('POST.produk_spesifikasi');
        $tags = $this->framework->get('POST.produk_tag');

        $slug = $this->seo_slug($nama);
        $slug_kategori = $this->seo_slug($kategori);
        $deskripsi = $this->convert_md($deskripsi);
        $fitur = $this->convert_md($fitur);
        $spesifikasi = $this->convert_md($spesifikasi);
        $tags = strtolower($tags);

        $this->framework->mset(
            array(
                'produk_nama' => ucwords($nama),
                'produk_slug' => strtolower($slug),
                'produk_kategori_slug' => strtolower($slug_kategori),
                'produk_kategori' => ucwords($kategori),
                'produk_deskripsi' => $deskripsi,
                'produk_fitur' => $fitur,
                'produk_spesifikasi' => $spesifikasi,
                'produk_tag' => $tags
            )
        );

        $this->framework->set('content', 'hasil.html');
    }
}

/* End of file presenter.php
 * Location: FUNCTION
 */
