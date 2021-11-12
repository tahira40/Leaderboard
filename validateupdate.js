
    
    const playerName = document.querySelector ('#pname');
    
    const playerNum = document.querySelector ('#pnum');
    const teamName = document.querySelector ('#tname');
    const posiTion = document.querySelector ('#posn'); 
    const height = document.querySelector ('#height');  
    const oponName = document.querySelector ('#oponname');
    const gId = document.querySelector ('#gid');
    const eventName = document.querySelector ('#ename');
    const divTion = document.querySelector ('#division');
    const faciLity = document.querySelector ('#facility');
    const ecState = document.querySelector ('#e-c-state');
    const pEr = document.querySelector ('#per');

    

    

    const min = 3,
    max = 30;
    const regName = /^[a-zA-Z]+(?:(?:\. |[' ])[a-zA-Z]+)*$/;

const hasValue = input => isNaN(parseInt(input.value, 10)) ? false : true;


const isRequired = value => value === "" ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

const showError = (input, message) => {

const formfield = input.parentElement;

formfield.classList.add('error');
const error = formfield.querySelector('small');
error.textContent = message;

};

const checkpName = (name) =>{
    let valid = false;
    
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Player name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid player name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Player name must be between 3 to 30 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}



const checktName = (name) =>{
    let valid = false;
    
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Team name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid team name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Team name must be between 3 to 30 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}

const checkopName = (name) =>{
    let valid = false;
    
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Opponent name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid opponent name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Opponent name must be between 3 to 30 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}

const checkGameId = input=> {
    let valid = false;
    const regName = /^[a-zA-Z0-9]+$/;
    const gameId= input.value.trim();
    if(!isRequired(gameId)){
        showError(input, 'Game Id cannot be blank.');
    }
    else if(!regName.test(gameId)){
        showError(input, `Please enter a valid game id.`);
     } 
     else
     {
       
        valid = true;
     }

     return valid;
}

const checkeName = (name) =>{
    let valid = false;
    let min = 3 , max = 20;
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Event name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid event name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Team name must be between 3 to 20 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}

const checkNumber = (input, message) => {
    //console.log(typeof(input));
    let valid = false;
    
    if (!hasValue(input)) {
        
        
        showError(input, message);
        
    }
    else if ( Number(input) < 0 ) {
        
        showError(input, message);

    }
      
    else {
            
        valid = true;
    }
    return valid; 

}

const checkheight = (input, message) => {
    //console.log(typeof(input));
    let valid = false;
    
    let Heightval = parseInt(input);

    console.log("Heightval: ", Heightval);
    
    if (!hasValue(input)) {
        
        
        showError(input, message);
        
    }
    else if ( Heightval < 120 || Heightval > 190 ) {
        let message = "height should be between 120 to 190."
        showError(Heightval, message);

    }
      
    else {
            
        valid = true;
    }
    return valid; 

}



const checkfName = (name) =>{
    let valid = false;
    let min = 3, max = 20;
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Facility name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid facility name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Facility name must be between 3 to 20 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}

const checkstateName = (name) =>{
    let valid = false;
    const trimName = name.value.trim();

    if (!isRequired(trimName)) {
        const message = "Event city state name can not be blank.";
        showError(name, message);
    }
    else if(!regName.test(trimName)){
        const message = "Please enter valid event city state name.";
        showError(name, message);
     } 
     else if (!isBetween(trimName.length, min, max)) {
        const message = "Event city state name must be between 3 to 20 characters."; 
        showError(name, message);
    } 
    
     else {
            
        valid = true;
        }
    return valid;

}


const pnumRequired = "Player number can not be blank and should be valid.";
const posRequired = "Position number can not be blank and should be valid.";
const heightRequired = "Height can not be blank and should be valid.";
const divisionRequired = "Division number can not be blank and should be valid.";
const perRequired = "PER Number can not be blank and should be valid.";
    

const checkPlayername = () => checkpName(playerName);

const checkPlayernum = () => checkNumber(playerNum, pnumRequired);

const checkTeamname = () => checktName(teamName); 

const checkPosition = () => checkNumber(posiTion, posRequired);
 
const checkHeight = () => checkheight(height, heightRequired);

const checkOponname = () => checkopName(oponName);

const checkGameid = () => checkGameId(gId);

const checkEventname = () => checkeName(eventName);

const checkDivision = () => checkNumber(divTion, divisionRequired);

const checkFacility = () => checkfName(faciLity);

const checkECstate = () => checkstateName(ecState);

const checkPer = () => checkNumber(pEr, perRequired);
  

const form = document.getElementById("playInfo"); 
form.addEventListener ('submit', (e) => {

    const Heightval = document.getElementById("height").value;
    let isPlayernameValid = checkPlayername();
    let isPlayernumValid = checkPlayernum();
    let isTeamnameValid = checkTeamname();
    let isPositionValid = checkPosition();
    let isHeightValid = checkHeight();
    let isOponnameValid = checkOponname();
    let isGameidValid = checkGameid();
    let isEventnameValid = checkEventname();
    let isDivisionValid = checkDivision();
    let isFacilityValid = checkFacility();
    let isStateValid = checkECstate();
    let isPerValidate = checkPer();
    
    let isFormValid = isPlayernameValid && isPlayernumValid && 
                        isTeamnameValid && isPositionValid && isHeightValid && isOponnameValid && 
                        isGameidValid && isEventnameValid && isDivisionValid &&
                        isFacilityValid && isStateValid && isPerValidate;
   

    // submit to the server if the form is valid
    if (isFormValid) {
        form.submit();
    }
    else{
        e.preventDefault();
    }
        

});


















