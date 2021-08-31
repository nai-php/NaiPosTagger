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
' ten . col .',
' s . r . l .',
' s . p . a .',
' s . n . c .',
' s . l . m .',
' s . a . s .',
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
' d . lgt .',
' s . em .',
' ph . d .',
' es .',
' p . es .',
' l . st .',
' dr . sse',
' dr . ssa',
' dot . re',
' p . s .',
' p . iva',
' a . c .',
' d . r',
' & c .',

' o . f . m . conv .',
' s . acc . p . a .',
' o . f . m . cap .',
' co . re . co .',
' r . i . na .',
' ten . col .',
' s . r . l .',
' s . p . a .',
' s . n . c .',
' s . l . m .',
' s . a . s .',
' resp . scient .',
' loc . cit .',
' aff . est .',
' st . civ .',
' settentr .',
' op . cit .',
' l . cost .',
' ss . rr .',
' et . c',
' ph . d',
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
' d . ssa',
' dott . re',
' d . lgt .',
' string .',
' sig . ra',
' s . em .',
' ph . d .',
' p . es .',
' l . st .',
' i . e .',
' dr . sse',
' dr . ssa',
' dot . re',
' fatt .',
' fat .',
' ft .',
' treas .',
' respons .',
' trans .',
' suppl .',
' spett .',
' descr .',
' proff .',
' p . s .',
' p . iva',
' occid .',
' merid .',
' cresc .',
' accel .',
' a . c .',
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
' sec .',
' soc .',
' sim .',
' sig .',
' sgg .',
' sez .',
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
' ref .',
' reg .',
' rag .',
' pas .',
' par .',
' pag .',
' ott .',
' org .',
' onn .',
' occ .',
' jnr .',
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
' ext .',
' d . r',
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
' arg .',
' apr .',
' ang .',
' amm .',
' amb .',
' ago .',
' abr .',
' & c .',
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
' ex .',
' dr .',
' dd .',
' vs .',
' ct .',
' co .',
' az .',
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
