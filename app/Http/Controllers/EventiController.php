<?php

namespace App\Http\Controllers;

use App\Event;
use App\Klijent;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventi = Event::all();
        return view('eventi.index')->with('eventi', $eventi);
    }

    public function create()
    {
        $klijenti = Klijent::all();
        return view('eventi.create')->with('klijenti', $klijenti);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'datum_pocetka' => 'required',
            'vreme_pocetka' => 'required',
            'datum_zavrsetka' => 'required',
            'vreme_zavrsetka' => 'required',
            'klijent' => 'required|nullable',
        ]);

        $datum_pocetka = Carbon::parse($request->input('datum_pocetka'));
        $datum_zavrsetka = Carbon::parse($request->input('datum_zavrsetka'));

        $vreme_pocetka = Carbon::parse($request->input('vreme_pocetka'));
        $vreme_zavrsetka = Carbon::parse($request->input('vreme_zavrsetka'));

        $razlika_datuma = $datum_pocetka->diffInDays($datum_zavrsetka, false);
        $razlika_vremena = $vreme_pocetka->diffInMinutes($vreme_zavrsetka, false);

        if ($razlika_datuma < 0)
        {
            return redirect('/eventi/create')->with('error', "Datum pocetka ne sme biti veci od datuma zavrsetka.");
        }
        elseif ($razlika_datuma == 0)
        {
            if($razlika_vremena < 0)
            {
                return redirect('/eventi/create')->with('error', "Vreme pocetka ne sme biti vece od vremena zavrsetka.");
            }
        }

        $eventi = new Event;
        $eventi->naziv = $request->input('naziv');
        $eventi->datum_pocetka = $request->input('datum_pocetka');
        $eventi->vreme_pocetka = $request->input('vreme_pocetka');
        $eventi->datum_zavrsetka = $request->input('datum_zavrsetka');
        $eventi->vreme_zavrsetka = $request->input('vreme_zavrsetka');
        $eventi->klijent_id = $request->input('klijent');

        $eventi->save();

        return redirect('/eventi')->with('success', 'Uspesno dodat novi event!');
    }

    public function edit($id)
    {
        $event = Event::find($id);
        $klijenti = Klijent::all();
        //pravimo novu varijablu koja iz tabele eventa trazi klijenta s nekim ID-om
        $eventovKlijentId = $event->klijent->id;

        return view('eventi.edit', [
            'event' => $event,
            'klijenti' => $klijenti,
            'eventovKlijentId' => $eventovKlijentId
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => 'required',
            'datum_pocetka' => 'required',
            'vreme_pocetka' => 'required',
            'datum_zavrsetka' => 'required',
            'vreme_zavrsetka' => 'required',
            'klijent' => 'required',
        ]);

        $datum_pocetka = Carbon::parse($request->input('datum_pocetka'));
        $datum_zavrsetka = Carbon::parse($request->input('datum_zavrsetka'));

        $vreme_pocetka = Carbon::parse($request->input('vreme_pocetka'));
        $vreme_zavrsetka = Carbon::parse($request->input('vreme_zavrsetka'));

        $razlika_datuma = $datum_pocetka->diffInDays($datum_zavrsetka, false);
        $razlika_vremena = $vreme_pocetka->diffInMinutes($vreme_zavrsetka, false);

        if ($razlika_datuma < 0)
        {
            return redirect('/eventi/edit/' . $id)->with('error', "Datum pocetka ne sme biti veci od datuma zavrsetka.");
        }
        elseif ($razlika_datuma == 0)
        {
            if($razlika_vremena <= 0)
            {
                return redirect('/eventi/edit/' . $id)->with('error', "Vreme pocetka ne sme biti vece ili jednako vremenu zavrsetka.");
            }
        }

        $eventi = Event::find($id);
        $eventi->naziv = $request->input('naziv');
        $eventi->datum_pocetka = $request->input('datum_pocetka');
        $eventi->vreme_pocetka = $request->input('vreme_pocetka');
        $eventi->datum_zavrsetka = $request->input('datum_zavrsetka');
        $eventi->vreme_zavrsetka = $request->input('vreme_zavrsetka');
        $eventi->klijent_id = $request->input('klijent');

        $eventi->save();

        return redirect('/eventi')->with('success', 'Vase promene su uspesno sacuvane!');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/eventi')->with('success', 'Event uspesno obrisan!');
    }
}
