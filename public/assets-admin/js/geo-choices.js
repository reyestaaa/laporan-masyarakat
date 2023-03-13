var selectProvinces = document.querySelector('[name="provinces_id"]');
var $selectProvinces = $(selectProvinces); 
var choicesProvinces = new Choices(selectProvinces); 

var selectRegencies = document.querySelector('[name="regencies_id"]');
var $selectRegencies = $(selectRegencies); 
var choicesRegencies = new Choices(selectRegencies); 

var selectDistricts = document.querySelector('[name="districts_id"]');
var $selectDistricts = $(selectDistricts); 
var choicesDistricts = new Choices(selectDistricts); 

var selectVillages = document.querySelector('[name="villages_id"]');
var $selectVillages = $(selectVillages); 
var choicesVillages = new Choices(selectVillages); 

const changeProvince = (provinces_id, default_regency_id = null) => {
    choicesRegencies.disable(); 
    axios({
        url: `/admin/regency/province`,
        method: 'GET', 
        params: {
            id: provinces_id
        }
    })
    .then((resultJson) => {
        let regencies = []; 
        $.each(resultJson.data, (_, regency) => {
            regencies.push({
                value: regency.id, 
                label: regency.name
            }); 
        }); 
        
        choicesRegencies.setChoices(regencies).setChoiceByValue(default_regency_id).enable(); 
    })
    .catch(errorResponse => {
        console.log(errorResponse); 
        handleErrorRequest(errorResponse); 
    })
}; 

const changeRegency = async (regencies_id, default_district_id=null) => {
    choicesDistricts.disable(); 
    axios({
        url: `/admin/district/regency`,
        method: 'GET', 
        params: {
            id: regencies_id
        }
    })
    .then(resultJson => {
        let districts = []; 
        $.each(resultJson.data, (_, district) => {
            districts.push({
                value: district.id, 
                label: district.name
            }); 
        }); 
        
        choicesDistricts.setChoices(districts).setChoiceByValue(default_district_id).enable(); 
    })
    .catch(errorResponse => {
        handleErrorRequest(errorResponse); 
    });
};

const changeDistrict = async (district_id, default_village_id) => {
    choicesVillages.disable(); 
    axios({
        url: `/admin/village/district`,
        method: 'GET', 
        params: {
            id: district_id
        }
    })
    .then(resultJson => {
        let villages = []; 
        $.each(resultJson.data, (_, village) => {
            villages.push({
                value: village.id, 
                label: village.name
            }); 
        }); 
        
        choicesVillages.setChoices(villages).setChoiceByValue(default_village_id).enable(); 
    })
    .catch(errorResponse => {
        handleErrorRequest(errorResponse); 
    })
}; 