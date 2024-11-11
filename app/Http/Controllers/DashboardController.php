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
        $articles = DB::table('articles')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Paginate with 10 items per page
    
        $data = [
            'title' => 'List Artikel',
            'articles' => $articles,
        ];
    
        return view('dashboard.artikel.index', $data);
    }
    

    public function paket()
    {
        $packages = DB::table('packages')
            ->join('package_detail', 'packages.id', '=', 'package_detail.package_id')
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
        // $perlengkapan = strip_tags($perlengkapan);

        $dokumen_persyaratan = $request->dokumen_persyaratan;
        // $dokumen_persyaratan = strip_tags($dokumen_persyaratan);

        $snk = $request->snk;
        // $snk = strip_tags($snk);

        $fasilitas = $request->fasilitas;
        // $fasilitas = strip_tags($fasilitas);


        try {

            $package_id = DB::table('packages')->insertGetId(
            [
                'package_name' => $request->title,
                'duration' => $request->duration,
                'category_id' => $request->tipe_paket,
                'slug' => $slug,
                'media_banner' => 'assets/images/paket/' . $media_brosur_name,
                'harga_mulai' => $harga_mulai,
            ]);

            DB::table('package_detail')->insert([
                'package_id' => $package_id,
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

    public function banner(){
        $banners = DB::table('banner')->get();

        $data = [
            'title' => 'Banner',
            'banners' => $banners,

        ];

        return view('dashboard.banner.index', $data);
    }

    public function bannerCreate(){
        
        $data = [
            'title' => 'Tambah Banner',
        ];

        return view('dashboard.banner.create', $data);
    }

    public function bannerStore(Request $request){
        $image = $request->file('image');
        $image_name = time() . '.' . $image->extension();
        // store to assets/article
        $image->move(public_path('assets/images/banner'), $image_name);

        DB::table('banner')->insert([
            'title' => $request->title,
            'image_path' => 'assets/images/banner/' . $image_name,
        ]);

        return redirect()->route('dashboard.banner.index')->with('success', 'Banner berhasil ditambahkan');
    }

    public function paketDelete($id)
    {
        DB::table('packages')->where('id', $id)->delete();
        DB::table('package_detail')->where('package_id', $id)->delete();
        return redirect()->route('dashboard.paket.index')->with('success', 'Paket berhasil dihapus');
    }

    public function paketEdit($id)
    {
        // Retrieve the package and its details by ID
        $paket = DB::table('packages')
                    ->join('package_detail', 'packages.id', '=', 'package_detail.package_id')
                    ->where('packages.id', $id)
                    ->select('packages.*', 'package_detail.*')
                    ->first();

        if (!$paket) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Paket Mina Wisata',
            'paket' => $paket,
        ];

        // Pass the package data to the edit view
        return view('dashboard.paket.edit', $data);
    }

    public function paketUpdate(Request $request, $id)
    {
        $slug = preg_replace('/[^a-zA-Z0-9]/', '-', $request->title);
        $slug = strtolower($slug);

        // Remove dots from price and convert to int
        $harga_quad = (int) str_replace('.', '', $request->harga_quad);
        $harga_triple = (int) str_replace('.', '', $request->harga_triple);
        $harga_double = (int) str_replace('.', '', $request->harga_double);
        $harga_mulai = (int) str_replace('.', '', $request->harga_mulai);

        $package = DB::table('packages')->where('id', $id)->first();
        if (!$package) {
            return redirect()->back()->with('error', 'Paket tidak ditemukan.');
        }

        if ($request->hasFile('media_brosur')) {
            $media_brosur = $request->file('media_brosur');
            $media_brosur_name = time() . '_brosur.' . $media_brosur->extension();
            $media_brosur->move(public_path('assets/images/paket'), $media_brosur_name);
        } else {
            $media_brosur_name = basename($package->media_banner);
        }

        if ($request->hasFile('media_itenary')) {
            $media_itinerary = $request->file('media_itenary');
            $media_itinerary_name = time() . '_itenary.' . $media_itinerary->extension();
            $media_itinerary->move(public_path('assets/images/paket'), $media_itinerary_name);
        } else {
            $media_itinerary_name = basename($package->itenary_media);
        }

        $perlengkapan = $request->perlengkapan;
        $dokumen_persyaratan = $request->dokumen_persyaratan;
        $snk = $request->snk;
        $fasilitas = $request->fasilitas;

        try {
            DB::table('packages')->where('id', $id)->update([
                'package_name' => $request->title,
                'duration' => $request->duration,
                'category_id' => $request->tipe_paket,
                'slug' => $slug,
                'media_banner' => 'assets/images/paket/' . $media_brosur_name,
                'harga_mulai' => $harga_mulai,
            ]);

            DB::table('package_detail')->where('package_id', $id)->update([
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
                'fasilitas' => $fasilitas,
                'itenary_media' => 'assets/images/paket/' . $media_itinerary_name,
                'harga_mulai' => $harga_mulai,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silahkan coba lagi. ERROR: ' . $e->getMessage());
        }

        return redirect()->route('dashboard.paket.index')->with('success', 'Paket berhasil diperbarui');
    }

    public function bannerUpdate(Request $request) {
        $banner = DB::table('banner')->where('id', $request->id)->first();
    
        if ($banner) {
            // Toggle status
            $status = $banner->is_active == 1 ? 0 : 1;
    
            DB::table('banner')->where('id', $request->id)->update([
                'is_active' => $status
            ]);
    
            // Return JSON response
            return response()->json([
                'status' => 200,
                'message' => 'Status banner berhasil diubah.'
            ]);
        }
    
        return response()->json([
            'status' => 500,
            'message' => 'Banner tidak ditemukan.'
        ], 500);
    }

    public function bannerDelete(Request $request){
        $banner = DB::table('banner')->where('id', $request->id)->first();
    
        if ($banner) {
            DB::table('banner')->where('id', $request->id)->delete();
    
            return response()->json([
                'status' => 200,
                'message' => 'Banner berhasil dihapus.'
            ]);
        }
    
        return response()->json([
            'status' => 500,
            'message' => 'Banner tidak ditemukan.'
        ], 500);
    }
    
    
}
