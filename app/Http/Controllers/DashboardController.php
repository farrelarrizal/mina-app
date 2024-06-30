<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //index
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
        ];

        return view('dashboard.index', $data);
    }

    public function artikel()
    {
        $articles = DB::table('articles')->orderBy('created_at', 'desc')->get();
        $data = [
            'title' => 'List Artikel',
            'articles' => $articles,
        ];
        return view('dashboard.artikel.index', $data);
    }

    public function paket()
    {
        $packages = DB::table('packages')
            ->join('package_detail', 'packages.slug', '=', 'package_detail.slug')
            ->join('package_category', 'packages.category_id', '=', 'package_category.id')
            ->orderBy('packages.created_at', 'desc')
            ->get();
        $data = [
            'title' => 'List Paket Mina Wisata',
            'packages' => $packages,
        ];
        // dd($packages);

        return view('dashboard.paket.index', $data);
    }

    public function tipe()
    {
        $tipe_paket = DB::table('package_category')->get();
        $data = [
            'title' => 'List Tipe Paket Mina Wisata',
            'tipe_paket' => $tipe_paket,
        ];

        return view('dashboard.paket.tipe', $data);
    }

    public function paketreate()
    {
        $data = [
            'title' => 'Tambah Paket Mina Wisata',
        ];

        return view('dashboard.paket.create', $data);
    }

    public function artikelCreate()
    {
        $data = [
            'title' => 'Tambah Artikel',
        ];

        return view('dashboard.artikel.create', $data);
    }

    public function artikelStore(Request $request)
    {

        // remove punctuation
        $url = preg_replace('/[^a-zA-Z0-9]/', '-', $request->title);
        // remove multiple dash
        $url = preg_replace('/-+/', '-', $url);
        // remove dash from start and end
        $url = trim($url, '-');
        // lowercase
        $url = strtolower($url);
        // space to dash
        $url = str_replace(' ', '-', $url);

        // check if url already exist
        $url_exist = DB::table('articles')->where('url', $url)->first();
        if ($url_exist) {
            // reject if url already exist
            return redirect()->back()->with('error', 'Judul sudah ada, silahkan gunakan judul lain');
        }

        // save image
        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        // store to assets/article
        $image->move(public_path('assets/images/articles'), $image_name);

        // cut 250 char for content
        $desc = substr($request->content, 0, 250);

        // remove html tag
        $desc = strip_tags($desc);



        DB::table('articles')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'url' => $url,
            'image' => 'assets/images/articles/' . $image_name,
            'author' => $request->author,
            'desc' => $desc
        ]);

        // redirect bring message
        return redirect()->route('dashboard.artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function artikelDelete($id)
    {
        DB::table('articles')->where('id', $id)->delete();
        return redirect()->route('dashboard.artikel.index')->with('success', 'Artikel berhasil dihapus');
    }

    public function artikelEdit($id)
    {
        $article = DB::table('articles')->where('id', $id)->first();
        $data = [
            'title' => 'Edit Artikel',
            'article' => $article,
        ];

        return view('dashboard.artikel.edit', $data);
    }

    public function artikelUpdate(Request $request, $id)
    {
        // remove punctuation
        $url = preg_replace('/[^a-zA-Z0-9]/', '-', $request->title);
        // remove multiple dash
        $url = preg_replace('/-+/', '-', $url);
        // remove dash from start and end
        $url = trim($url, '-');
        // lowercase
        $url = strtolower($url);
        // space to dash
        $url = str_replace(' ', '-', $url);

        // check if url already exist
        $url_exist = DB::table('articles')->where('url', $url)->first();
        if ($url_exist) {
            // reject if url already exist
            return redirect()->back()->with('error', 'Judul sudah ada, silahkan gunakan judul lain');
        }

        // save image
        $image = $request->file('image');
        if ($image) {
            $image_name = time() . '.' . $image->extension();
            // store to assets/article
            $image->move(public_path('assets/images/articles'), $image_name);
        } else {
            $image_name = $request->old_image;
        }

        // cut 250 char for content
        $desc = substr($request->content, 0, 250);

        // remove html tag
        $desc = strip_tags($desc);

        DB::table('articles')->where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'url' => $url,
            'image' => 'assets/images/articles/' . $image_name,
            'author' => $request->author,
            'desc' => $desc
        ]);

        // redirect bring message
        return redirect()->route('dashboard.artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    public function paketCreate()
    {

        $tipe_paket = DB::table('package_category')->get();
        $data = [
            'title' => 'Tambah Paket Mina Wisata',
            'tipe_paket' => $tipe_paket,
        ];

        return view('dashboard.paket.create', $data);
    }

    public function paketStore(Request $request)
    {
        // dd($request->all());
        $slug = preg_replace('/[^a-zA-Z0-9]/', '-', $request->title);
        $slug = strtolower($slug);
        // dd($slug);

        // remove . from price and convert to int
        $harga_quad =  (int) str_replace('.', '', $request->harga_quad);
        $harga_triple =  (int) str_replace('.', '', $request->harga_triple);
        $harga_double =  (int) str_replace('.', '', $request->harga_double);
        $harga_mulai =  (int) str_replace('.', '', $request->harga_mulai);

        // save image
        $media_brosur = $request->file('media_brosur');
        $media_brosur_name = time() . '.' . $media_brosur->extension();
        // store to assets/article
        $media_brosur->move(public_path('assets/images/paket'), $media_brosur_name);

        $media_itinerary = $request->file('media_itenary');
        $media_itinerary_name = time() . '.' . $media_itinerary->extension();
        // store to assets/article
        $media_itinerary->move(public_path('assets/images/paket'), $media_itinerary_name);

        // try slug is exist
        $slug_exist = DB::table('packages')->where('slug', $slug)->first();
        if ($slug_exist) {
            return redirect()->back()->with('error', 'Slug sudah ada, silahkan gunakan judul lain');
        }

        // keep the html tag
        $perlengkapan = $request->perlengkapan;
        $perlengkapan = strip_tags($perlengkapan);

        $dokumen_persyaratan = $request->dokumen_persyaratan;
        $dokumen_persyaratan = strip_tags($dokumen_persyaratan);

        $snk = $request->snk;
        $snk = strip_tags($snk);

        $fasilitas = $request->fasilitas;
        $fasilitas = strip_tags($fasilitas);

        try {

            DB::table('packages')->insert([
                'package_name' => $request->title,
                'duration' => $request->duration,
                'category_id' => $request->tipe_paket,
                'slug' => $slug,
                'media_banner' => 'assets/images/paket/' . $media_brosur_name,
                'harga_mulai' => $harga_mulai,
            ]);

            DB::table('package_detail')->insert([
                'slug' => $slug,
                'package_description' => $request->description,
                'maskapai' => $request->maskapai,
                'hotel_madinah' => $request->hotel_madinah,
                'hotel_makkah' => $request->hotel_makkah,
                'harga_quad' => $harga_quad,
                'harga_triple' => $harga_triple,
                'harga_double' => $harga_double,
                'perlengkapan' => $perlengkapan,
                'dokumen_persyaratan' => $dokumen_persyaratan,
                'syarat_ketentuan' => $snk,
                'fasilitas' => $request->fasilitas,
                'itenary_media' => 'assets/images/paket/' . $media_itinerary_name,
                'harga_mulai' => $harga_mulai,

            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi. ERROR: ' . $e->getMessage());
        }

        return redirect()->route('dashboard.paket.index')->with('success', 'Paket berhasil ditambahkan');
    }
}
