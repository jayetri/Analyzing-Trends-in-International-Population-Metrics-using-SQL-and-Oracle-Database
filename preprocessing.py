import pandas as pd

df1 = pd.read_csv ('/home/jayetri/international-data/midyear_population_age_sex.csv')
#print (df1.head())
no_of_rows = df1.shape[0]
print("midyear_population_age_sex")
print(no_of_rows)
df11= df1.drop_duplicates(subset=['country_name', 'year','sex'])
no_of_rows11 = df11.shape[0]
print(no_of_rows11)
df11.to_csv ('/home/jayetri/international-data/modified/midyear_population_age_sex_changed.csv', index = False, header=True)


df2 = pd.read_csv ('/home/jayetri/international-data/midyear_population_age_country_code.csv')
#print (df1.head())
no_of_rows = df2.shape[0]
print("midyear_population_age_country_code")
print(no_of_rows)
df22= df2.drop_duplicates(subset=['country_name', 'year', 'sex'])
no_of_rows22 = df22.shape[0]
print(no_of_rows22)
df22.to_csv ('/home/jayetri/international-data/modified/midyear_population_age_country_code_changed.csv', index = False, header=True)




df3 = pd.read_csv ('/home/jayetri/international-data/mortality_life_expectancy.csv')
#print (df1.head())
no_of_rows = df3.shape[0]
print("mortality_life_expectancy")
print(no_of_rows)
df33= df3.drop_duplicates(subset=['country_code', 'year'])
no_of_rows33 = df33.shape[0]
print(no_of_rows33)
df33.to_csv ('/home/jayetri/international-data/modified/mortality_life_expectancy_changed.csv', index = False, header=True)






df4 = pd.read_csv ('/home/jayetri/international-data/midyear_population_5yr_age_sex.csv')
#print (df1.head())
no_of_rows = df4.shape[0]
print("midyear_population_5yr_age_sex.csv")
print(no_of_rows)
df44= df4.drop_duplicates(subset=['country_name', 'year'])
no_of_rows44 = df44.shape[0]
print(no_of_rows44)
df44.to_csv ('/home/jayetri/international-data/modified/midyear_population_5yr_age_sex_changed.csv', index = False, header=True)




df5 = pd.read_csv ('/home/jayetri/international-data/midyear_population.csv')
#print (df1.head())
no_of_rows = df5.shape[0]
print("midyear_population.csv")
print(no_of_rows)
df55= df5.drop_duplicates(subset=['country_code', 'year'])
no_of_rows55 = df55.shape[0]
print(no_of_rows55)
df55.to_csv ('/home/jayetri/international-data/modified/midyear_population_changed.csv', index = False, header=True)





df6 = pd.read_csv ('/home/jayetri/international-data/country_names_area.csv')
#print (df1.head())
no_of_rows = df6.shape[0]
print("country_names_area.csv")
print(no_of_rows)
df66= df6.drop_duplicates(subset=['country_code'])
no_of_rows66 = df66.shape[0]
print(no_of_rows66)
df66.to_csv ('/home/jayetri/international-data/modified/country_names_area_changed.csv', index = False, header=True)



df7 = pd.read_csv ('/home/jayetri/international-data/birth_death_growth_rates.csv')
#print (df1.head())
no_of_rows = df7.shape[0]
print("birth_death_growth_rates.csv")
print(no_of_rows)
df77= df7.drop_duplicates(subset=['country_code', 'year'])
no_of_rows77 = df77.shape[0]
print(no_of_rows77)
df77.to_csv ('/home/jayetri/international-data/modified/birth_death_growth_rates_changed.csv', index = False, header=True)



df8 = pd.read_csv ('/home/jayetri/international-data/age_specific_fertility_rates.csv')
#print (df1.head())
no_of_rows = df8.shape[0]
print("age_specific_fertility_rates.csv")
print(no_of_rows)
df88= df8.drop_duplicates(subset=['country_code', 'year'])
no_of_rows88 = df88.shape[0]
print(no_of_rows88)
df88.to_csv ('/home/jayetri/international-data/modified/age_specific_fertility_rates_changed.csv', index = False, header=True)
