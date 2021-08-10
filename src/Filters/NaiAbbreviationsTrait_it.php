<?php

/**
 * This file is part of N-ai a php chat bot with AI capabilities.
 *
 * (c) Giorgio G. Rey <grey@n-ai.cloud>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 

namespace NaiPosTagger\Filters;

trait AbbreviationsTrait {

    /** List of abbreviations */
    // @todo clear/add
    // @note don't put spaces after the last "."
    public static $locale_abbreviations = [
		' o . f . m . conv .',
		' s . acc . p . a .',
		' o . f . m . cap .',
		' co . re . co .',
		' r . i . na .',
		' dott . ing .',
		' cons . gen .',
		' ten . col .',
		' s . r . l .',
		' s . p . a .',
		' s . n . c .',
		' s . l . m .',
		' s . a . s .',
		' r . sociale',
		' resp . scient .',
		' loc . cit .',
		' aff . est .',
		' st . civ .',
		' op . cit .',
		' l . cost .',
		' ss . rr .',
		' et . c',
		' ss . pp .',
		' s . r . l',
		' s . p . a',
		' s . acc .',
		' s . a . s',
		' pp . tt .',
		' pp . ss .',
		' pp . ff .',
		' p . ass .',
		' oo . rr .',
		' oo . pp .',
		' oo . mm .',
		' m . rev .',
		' ll . pp .',
		' ll . mm .',
		' ll . aa .',
		' l . reg .',
		' l . cit .',
		' ff . aa .',
		' dott . ssa',
		' dott . re',
		' sed . leg . ',
		' d . lgt .',
		' sig . ra',
		' s . em .',
		' c . so ',
		' ph . d .',
		' i . e .',
		' p . es .',
		' dr . sse',
		' dr . ssa',
		' dot . re',
		' p . s .',
		' p . iva',
		' digital soluz .',
		' f . cie',
		' f . cia',
		' a . c .',
		' c . p .',
		' d . r',
		' & c .',
		' settentr .',
		' soprast .',
		' d . ssa',
		' string .',
		' orient .',
		' l . st .',
		' allarg .',
		' fatt .',
		' fat .',
		' ft .',
		' treas .',
		' registraz .',
		' respons .',
		' trans .',
		' suppl .',
		' spett .',
		' descr .',
		' proff .',
		' occid .',
		' merid .',
		' cresc .',
		' accel .',
		' univ .',
		' trib .',
		' trad .',
		' trim .',
		' tot .',
		' stud .',
		' sopr .',
		' somm .',
		' sigg .',
		' sett .',
		' serg .',
		' segg .',
		' secy .',
		' secc .',
		' rist .',
		' risp .',
		' rall .',
		' racc .',
		' quot .',
		' prov .',
		' prof .',
		' proc .',
		' priv .',
		' pres .',
		' preg .',
		' pref .',
		' pizz .',
		' phil .',
		' pass .',
		' pagg .',
		' obbl .',
		' mons .',
		' magg .',
		' long .',
		' lett .',
		' kcal .',
		' ingg .',
		' ines .',
		' ibid .',
		' geom .',
		' gent .',
		' genn .',
		' figs .',
		' figg .',
		' ediz .',
		' eccl .',
		' sugg .',
		' dott .',
		' decr .',
		' cred .',
		' cost .',
		' corp .',
		' coop .',
		' cons .',
		' comp .',
		' comm .',
		' coll .',
		' cass .',
		' bibl .',
		' banc .',
		' artt .',
		' arch .',
		' egr .',
		' vol .',
		' ven .',
		' cod .',
		' uni .',
		' uff .',
		' tit .',
		' ten .',
		' tel .',
		' tav .',
		' tab .',
		' lgs .',
		' rif .',
		' sup .',
		' str .',
		' srl .',
		' ref .',
		' sec .',
		' soc .',
		' sim .',
		' sig .',
		' sgg .',
		' sez .',
		' set .',
		' seq .',
		' sen .',
		' seg .',
		' sec .',
		' sab .',
		' spe .',
		' rit .',
		' rev .',
		' rep .',
		' rel .',
		' reg .',
		' red .',
		' rag .',
		' pas .',
		' par .',
		' pag .',
		' ott .',
		' org .',
		' onn .',
		' occ .',
		' num .',
		' nov .',
		' naz .',
		' nav .',
		' mss .',
		' mrs .',
		' mod .',
		' min .',
		' mgr .',
		' mer .',
		' max .',
		' mar .',
		' mag .',
		' lun .',
		' lug .',
		' ltd .',
		' lit .',
		' lat .',
		' ing .',
		' inf .',
		' ill .',
		' gov .',
		' giu .',
		' gio .',
		' gen .',
		' fig .',
		' feb .',
		' fdn .',
		' etc .',
		' ecc .',
		' drs .',
		' dom .',
		' doc .',
		' div .',
		' dir .',
		' dim .',
		' dic .',
		' ctg .',
		' cor .',
		' com .',
		' cod .',
		' cit .',
		' cfr .',
		' ced .',
		' cav .',
		' cap .',
		' cad .',
		' cab .',
		' avv .',
		' art .',
		' arg .',
		' apr .',
		' app .',
		' ang .',
		' amm .',
		' amb .',
		' all .',
		' ago .',
		' abr .',
		' tr .',
		' ss .',
		' sr .',
		' sg .',
		' rd .',
		' pt .',
		' ps .',
		' pr .',
		' pp .',
		' pm .',
		' op .',
		' on .',
		' mt .',
		' mb .',
		' ms .',
		' mr .',
		' lu .',
		' lt .',
		' ll .',
		' km .',
		' kg .',
		' jr .',
		' id .',
		' ib .',
		' hg .',
		' gr .',
		' es .',
		' em .',
		' ed .',
		' dr .',
		' dd .',
		' ct .',
		' co .',
		' az .',
		' vs .',
		' n .',
		' d .',
];
}


/**
 * Class definition
 */
class NaiAbbreviationsFilterTrait extends NaiAbbreviationsFilter {
    use AbbreviationsTrait;
}
